<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class DashboardController extends Controller
{
    public function index( )
    {
        $data=[
            'title'=> 'Dashboard Admin Peduli Diri',
            'petugas'=> User::where('role','Admin')->count(),
            'pengguna'=> User::where('role','User')->count(),

        ];
        return view('admin.home',$data);
    }

    public function profile( )
    {
        return view('admin.profile');
    }
}
