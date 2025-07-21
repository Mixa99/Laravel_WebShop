<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('index');
    }

    public function about(){
        return view('about');
    }

    public function register_form(){
        return view('auth_form/register_form', [
            'transparentNav' => true,
            'hideFooter' => true
        ]);
    }

    public function login_form(){
        return view('auth_form/login_form', [
            'transparentNav' => true,
            'hideFooter' => true
        ]);
    }
}
