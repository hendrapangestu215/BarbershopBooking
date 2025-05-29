<?php

namespace App\Http\Controllers;

use App\Models\Hairstyle;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch 4 hairstyles from the database
        $featuredHairstyles = Hairstyle::take(4)->get();

        return view('home', compact('featuredHairstyles'));
    }
}
