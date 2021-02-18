<?php

namespace App\Http\Controllers\Security;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ErrorReportingController extends Controller
{
    public function index()
    {
        return view('security.error-reporting');
    }
}
