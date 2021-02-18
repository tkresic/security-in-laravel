<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RetrieveUsersController extends Controller
{
    public function index(Request $request)
    {

        $email = $request->input('email');

        $sql = "SELECT * FROM users WHERE email = '$email'";

        try {
            $user = DB::SELECT($sql);
        } catch(\Illuminate\Database\QueryException $ex){
            $user = false;
        }

        return view('security.sql', compact('user'));
    }
}