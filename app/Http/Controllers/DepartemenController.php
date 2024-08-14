<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\MasterDepartemen;
use App\Models\MasterKaryawan;

class DepartemenController extends Controller
{
    public function index(){

        $key  = Str::uuid();

        $list_departemen = MasterDepartemen::where('status', 'A')->get();

        return view('departemen.index', compact('list_departemen', 'key'));
    }

    public function create(){

        $head_departemen = MasterKaryawan::where('status', 'A')->get();

        return view('departemen.create', compact('head_departemen'));
    }

    public function edit($id){

        $data            = MasterDepartemen::findOrFail($id);
        $head_departemen = MasterKaryawan::where('id_departemen', $data->id)->where('status', 'A')->get();

        return view('departemen.update', compact('data', 'head_departemen'));
    }

    public function store(Request $request){

        $request -> validate([
            'nama_departemen'   => 'required',
        ]);

        $input['nama_departemen']       = $request->nama_departemen;
        $input['id_head_departemen']    = $request->id_head_departemen;
        $input['status_departemen']     = 'A';
        $input['status']                = 'A';
        $input['created_by']            = Auth::user()->username;
        $input['updated_by']            = Auth::user()->username;

        $created    = MasterDepartemen::create($input);

        if ($created){
            return redirect()->route('departemen.index')->with('success','Data departemen baru berhasil ditambahkan!');
        } else{
            return redirect()->route('departemen.index')->with('danger','Data departemen baru gagal ditambahkan');
        }
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'nama_departemen'   => 'required'
        ]);
        
        try {
            
            $data = MasterDepartemen::findOrFail($id);

            $data->update([
                'nama_departemen'       => $request->nama_departemen,
                'id_head_departemen'    => $request->id_head_departemen,
                'updated_at'            => NOW(),
                'updated_by'            => Auth::user()->username,
            ]);

            return redirect()->route('departemen.index')->with('success', 'Data departemen berhasil diubah!');

        } catch (\Exception $e) {

            return redirect()->route('departemen.index')->with('danger', 'Terjadi kesalahan saat menghapus data departemen.');
        }
        
    }

    public function delete($id)
    {
        
        try {

            $data = MasterDepartemen::findOrFail($id);
            $data->delete();

            return redirect()->route('departemen.index')->with('success', 'Data departemen berhasil dihapus!');

        } catch (\Exception $e) {

            return redirect()->route('departemen.index')->with('danger', 'Terjadi kesalahan saat menghapus data departemen.');
        }
    }

}
