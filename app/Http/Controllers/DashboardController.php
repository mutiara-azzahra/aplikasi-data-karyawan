<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\MasterDepartemen;
use App\Models\MasterKaryawan;

class DashboardController extends Controller
{
    public function index()
    {
        $user             = Auth::user();
        $count_departemen = MasterDepartemen::where('status', 'A')->count();
        $count_karyawan   = MasterKaryawan::where('status', 'A')->count();
        $key              = Str::uuid();

        return view('dashboard', compact('user', 'count_departemen', 'count_karyawan', 'key'));
    }
}
