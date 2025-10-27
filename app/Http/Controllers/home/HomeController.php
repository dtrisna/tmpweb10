<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MenuKopi;



class HomeController extends Controller
{
  
    public function index()
    {
        $kopiList = MenuKopi::all(); // Ambil data dari database
        return view('home.halamanawal', compact('kopiList')); // Kirim ke view
    }


    
}
