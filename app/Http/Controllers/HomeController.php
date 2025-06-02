<?php

namespace App\Http\Controllers;

use App\Models\Hairstyle;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch 4 hairstyles from the database
        $featuredHairstyles = Hairstyle::take(4)->get();

        // Fetch 3 services from the database
        $services = Service::take(3)->get();

        return view('home', compact('featuredHairstyles', 'services'));
    }
}
