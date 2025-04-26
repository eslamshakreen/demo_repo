<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = [
            ['title' => 'Introducing ShopLite', 'author' => 'Admin'],
            ['title' => 'Why Laravel 12 Rocks', 'author' => 'Sara'],
        ];
        return view('blog.index', compact('posts'));
    }

    public function store(Request $request)
    {
        $title = $request->input('title');
        $author = $request->input('author');
        $post = ['title' => $title, 'author' => $author];
        return view('blog.show', compact('post'));
    }
}
