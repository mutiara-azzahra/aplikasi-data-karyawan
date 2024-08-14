<?php

namespace App\Http\Controllers;

use Auth;
use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\MasterDepartemen;
use App\Models\MasterKaryawan;
use App\Models\MasterJabatan;

class KaryawanController extends Controller
{
    public function index(){

        $key  = Str::uuid();
        $data_karyawan = MasterKaryawan::where('status', 'A')->get();

        return view('karyawan.index', compact('data_karyawan', 'key'));
    }

    public function create(){

        $departemen = MasterDepartemen::where('status', 'A')->get();
        $jabatan    = MasterJabatan::where('status', 'A')->get();

        return view('karyawan.create', compact('departemen', 'jabatan'));
    }

    public function store(Request $request){

        $request -> validate([
            'nik'           => 'required|min:16|max:16',
            'foto_karyawan' => 'required|image|mimes:jpeg,jpg,png|max:5000',
        ]);

        $check_nik = MasterKaryawan::where('nik', $request->nik)->first();

        if(!$check_nik){

            $extension = $request->foto_karyawan->getClientOriginalExtension();
            $nama_foto = time().'.'.$extension;

            $request->foto_karyawan->move(public_path('foto-karyawan'), $nama_foto);

            $input['nik']                   = $request->nik;
            $input['nama_karyawan']         = $request->nama_karyawan;
            $input['email']                 = $request->email;
            $input['alamat']                = $request->alamat;
            $input['nomor_telepon']         = $request->nomor_telepon;
            $input['tempat_lahir']          = $request->tempat_lahir;
            $input['tanggal_lahir']         = $request->tanggal_lahir;
            $input['foto_karyawan']         = $nama_foto;
            $input['tanggal_awal_bekerja']  = $request->tanggal_awal_bekerja;
            $input['tanggal_akhir_bekerja'] = $request->tanggal_akhir_bekerja;
            $input['id_jabatan']            = $request->id_jabatan;
            $input['id_departemen']         = $request->id_departemen;
            $input['status_karyawan']       = 'A';
            $input['status']                = 'A';
            $input['created_by']            = 'TES';
            $input['updated_by']            = 'TES';

            $created    = MasterKaryawan::create($input);
            
            return redirect()->route('karyawan.index')->with('success','Data karyawan baru berhasil ditambahkan!');

        } else {

            return redirect()->route('karyawan.index')->with('danger','Data NIK karyawan sudah terdaftar!');
        }
    }

    public function edit($id){

        $data       = MasterKaryawan::findOrFail($id);
        $departemen = MasterDepartemen::where('status', 'A')->get();
        $jabatan    = MasterJabatan::where('status', 'A')->get();

        return view('karyawan.update', compact('data', 'departemen', 'jabatan'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'nik'           => 'required',
        ]);

        try {

            $data = MasterKaryawan::findOrFail($id);

            $data->update($request->all());

            return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil diubah!');

        } catch (\Exception $e) {

            return redirect()->route('karyawan.index')->with('danger', 'Terjadi kesalahan saat menghapus data karyawan.');
        }
        
    }

    public function delete($id)
    {
        
        try {

            $data = MasterKaryawan::findOrFail($id);
            $data->delete();

            return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil dihapus!');

        } catch (\Exception $e) {

            return redirect()->route('karyawan.index')->with('danger', 'Terjadi kesalahan saat menghapus data karyawan.');
        }
    }

    public function show($id){

        $data = MasterKaryawan::findOrFail($id);

        return view('karyawan.view', compact('data'));
    }

    public function cetak()
    {
        $data               = MasterKaryawan::where('status', 'A')->get();
        $pdf                = PDF::loadView('karyawan.reports', ['data'=>$data]);
        $pdf->setPaper('letter', 'potrait');

        return $pdf->stream('laporan-karyawan.pdf');
    }
}
