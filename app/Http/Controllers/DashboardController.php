<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // method untuk menampilkan halaman dashboard
    public function index()
    {
        return view('dashboard.index');
    }
}