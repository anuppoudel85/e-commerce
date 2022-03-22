<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function home()
    {
        if(auth()->user()->role == 0)
            return redirect('/');

        return redirect('/admin');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
