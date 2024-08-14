<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class ProfilController extends Controller
{
    public function index(){

        $data = Auth::user();

        return view('profil.index', compact('data'));
    }

    public function edit(){

        $key  = Str::uuid();
        $data = Auth::user();

        return view('profil.update', compact('data', 'key'));
    }

    public function update(Request $request, $id)
    {
        $key    = Str::uuid();
        $user   = User::findOrFail($id);
        $input  = $request->all();

        $request->validate([
            'password'  => 'required',
        ]);

        $input['password']  = Hash::make($request['password']);

        $user->password = $input['password'];
            
        $user->update();

        return redirect()->route('profil.index', ['id' => $id, 'key'=> $key])->with('success','Password user berhasil diubah!');           
        
    }
}
