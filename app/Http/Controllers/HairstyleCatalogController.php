<?php

namespace App\Http\Controllers;

use App\Models\Hairstyle;
use Illuminate\Http\Request;

class HairstyleCatalogController extends Controller
{
    public function index()
    {
        $hairstyles = Hairstyle::all();
        return view('hairstyleCatalog', compact('hairstyles'));
    }
}
