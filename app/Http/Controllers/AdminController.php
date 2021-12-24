<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function addview()
    {
        return view('admin.add_doctor');
    }

    public function dashboard()
    {
        return view('admin.home');
    }
}
