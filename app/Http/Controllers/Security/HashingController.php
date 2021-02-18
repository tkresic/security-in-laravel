<?php

namespace App\Http\Controllers\Security;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class HashingController extends Controller
{
    public function index()
    {
        return view('security.hashing');
    }

    public function hash(Request $request)
    {

        $hashed_string = Hash::make($request->input('hash'));

        return response()->json($hashed_string);

    }
}
