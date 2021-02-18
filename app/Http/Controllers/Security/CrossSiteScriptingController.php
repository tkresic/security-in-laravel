<?php

namespace App\Http\Controllers\Security;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CrossSiteScriptingController extends Controller
{
    public function index()
    {

        // Uzimanje svih postova iz baze
        $posts = Post::all();

        // Vraćanje na pogled
        return view('security.xss', compact('posts'));
    }

    public function attack(Request $request)
    {

        // Validiranje inputa
        $this->validate($request, [
                'title' => 'required|string|min:3',
                'content' => 'required|string|min:3',
        ]);

        // Dodavanje novog komentara u bazu
        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        // Redirektanje na CrossSiteScriptingController.php
        return redirect()->back();
    }
}
