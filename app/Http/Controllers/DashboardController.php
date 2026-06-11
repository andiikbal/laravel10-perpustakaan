<?php

namespace App\Http\Controllers;

use App\Models\User;

// use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('cekSudahLogin');
    }


    // tampil dashboard
    public function index()
    {
        $profile = User::find(session('id'));

        return view('dashboard/index', [
            'title'     => 'Dashboard',
            'profile'   => $profile
        ]);
    }
}
