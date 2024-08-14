<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\MasterJabatan;

class JabatanController extends Controller
{
    public function index(){

        $key  = Str::uuid();
        $list_jabatan = MasterJabatan::where('status', 'A')->get();

        return view('jabatan.index', compact('list_jabatan', 'key'));
    }

    public function create(){

        return view('jabatan.create');
    }

    public function store(Request $request){

        $request -> validate([
            'nama_jabatan'   => 'required',
        ]);

        $input['nama_jabatan']       = $request->nama_jabatan;
        $input['status_jabatan']     = 'A';
        $input['status']             = 'A';
        // $input['created_by']            = Auth::user()->username;
        // $input['updated_by']            = Auth::user()->username;

        $input['created_by']         = 'TES';
        $input['updated_by']         = 'TES';

        $created    = Masterjabatan::create($input);

        if ($created){
            return redirect()->route('jabatan.index')->with('success','Data jabatan baru berhasil ditambahkan!');
        } else{
            return redirect()->route('jabatan.index')->with('danger','Data jabatan baru gagal ditambahkan');
        }
    }

    public function edit($id){

        
        $data = MasterJabatan::findOrFail($id);

        return view('jabatan.update', compact('data'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'nama_jabatan'   => 'required'
        ]);

        try {

            $data = MasterJabatan::findOrFail($id);

            $data->update([
                'nama_jabatan'  => $request->nama_jabatan,
                'updated_at'    => NOW(),
                'updated_by'    => 'TEST',
            ]);

            return redirect()->route('jabatan.index')->with('success', 'Data jabatan berhasil diubah!');

        } catch (\Exception $e) {

            return redirect()->route('jabatan.index')->with('danger', 'Terjadi kesalahan saat menghapus data jabatan.');
        }
        
    }

    public function delete($id)
    {
        
        try {

            $data = Masterjabatan::findOrFail($id);
            $data->delete();

            return redirect()->route('jabatan.index')->with('success', 'Data jabatan berhasil dihapus!');

        } catch (\Exception $e) {

            return redirect()->route('jabatan.index')->with('danger', 'Terjadi kesalahan saat menghapus data jabatan.');
        }
    }
}
