<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboardAdmin');
    }

    public function transaksi()
    {
        return view('admin.transaksiAdmin');
    }
}
