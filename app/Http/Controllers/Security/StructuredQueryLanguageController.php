<?php

namespace App\Http\Controllers\Security;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StructuredQueryLanguageController extends Controller
{
    public function index()
    {
        $user = false;
        return view('security.sql', compact('user'));
    }
}