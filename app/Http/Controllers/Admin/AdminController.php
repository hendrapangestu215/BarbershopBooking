<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function manageHairstyle()
    {
        return view('admin.manageHairstyle');
    }

    public function manageBooking()
    {
        return view('admin.manageBooking');
    }

    public function manageService()
    {
        return view('admin.manageService');
    }

    public function manageMembership()
    {
        return view('admin.manageMembership');
    }
}
