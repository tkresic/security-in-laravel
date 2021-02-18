<?php

namespace App\Http\Controllers\Security;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EncryptionController extends Controller
{
    public function index()
    {
        return view('security.encryption');
    }

    public function encrypt(Request $request)
    {

        $encrypted_string = encrypt($request->input('hash'));

        return response()->json($encrypted_string);

    }
}
