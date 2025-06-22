<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->is_admin) {
            return view('admin.index');
        }

        return redirect('/')->with('error', 'У вас нет доступа к этой странице.');
    }
}

