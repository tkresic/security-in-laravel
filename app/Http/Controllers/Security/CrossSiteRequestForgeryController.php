<?php

namespace App\Http\Controllers\Security;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CrossSiteRequestForgeryController extends Controller
{
    public function index()
    {
        return view('security.csrf');
    }

    public function attack()
    {
        return redirect()->back();
    }
}
