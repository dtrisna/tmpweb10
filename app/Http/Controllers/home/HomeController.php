<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MenuKopi;



class HomeController extends Controller
{
  
    public function index(Request $request)
    {
        $kopiList = MenuKopi::all();

        // Cek apakah cookie persetujuan sudah ada
        $showCookieBanner = !$request->hasCookie('cookie_accepted');

        return view('home.halamanawal', compact('kopiList', 'showCookieBanner'));
    }

    public function acceptCookie()
    {
        return redirect()->route('home.public')->cookie('cookie_accepted', true, 60 * 24 * 30); // 30 hari
    }


    
}
