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

        $theme = $request->cookie('theme', 'light'); 
        $showCookieBanner = !$request->hasCookie('cookie_accepted');

        return view('home.halamanawal', compact('kopiList', 'showCookieBanner', 'theme'));
    }


    public function acceptCookie()
    {
        return redirect()->route('home.public')->cookie('cookie_accepted', true, 60 * 24 * 30);
    }


    public function halamanAwal(Request $request)
    {
        $theme = $request->cookie('theme', 'light'); 
        $showCookieBanner = !$request->hasCookie('cookie_accepted');

        return view('home.halamanawal', compact('theme', 'showCookieBanner'));
    }


    
}
