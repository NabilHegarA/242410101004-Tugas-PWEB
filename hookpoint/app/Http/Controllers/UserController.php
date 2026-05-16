<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('user.dashboardUser');
    }

    //ini nnti di hapus klu ada transaksi controller
    public function transaksi()
    {
        return view('user.transaksiUser');
    }
}
