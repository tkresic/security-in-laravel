<?php

namespace App\Http\Controllers\Security;

use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class MassAssignmentController extends Controller
{
    public function index()
    {
        return view('security.mass-assignment');
    }

    public function registerStudents(Request $request)
    {
        // Validiranje inputa
        $this->validate($request, [
                'first_name' => 'required|string|min:3',
                'last_name' => 'required|string|min:3',
                'dob' => 'required|date|min:3',
                'gender' => 'required|in:male,female',
        ]);

        Student::create($request->all());

        return view('security.mass-assignment');
    }
}
