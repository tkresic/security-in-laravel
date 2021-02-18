<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorReportingController extends Controller
{
    public function index()
    {
        return view('error')
    }
}
