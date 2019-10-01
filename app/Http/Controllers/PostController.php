<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class PostController extends Controller
{
    public function index()
    {
        $post = Post::all();
        return view('post.index', compact('post'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->text = $request->text;
        $file = $request->file('image');
        if (!empty($file)) {
            $image = $file->getClientOriginalName();
            $pathImage = "images/post/" . $image;
            if (file_exists($pathImage)) {
                $image = bin2hex(random_bytes(10)) . $image;
            }
            $file->move("images/post", $image);
            $post->image = $image;
        }
        $post->save();
        return redirect()->route('Post.create');
    }

    public function show($post)
    {
        $post = Post::findOrFail($post);
        return $post;
    }

    public function edit($post)
    {
        $post = Post::findOrFail($post);
        return view('post.edit', compact('post'));

    }

    public function update(Request $request, $post)
    {
        $post = Post::findOrFail($post);
        $post->title = $request->title;
        $post->text = $request->text;
        $file = $request->file('image');
        if (!empty($file)) {
            $pathImage = "images/post/" . $post->image;
            if (file_exists($pathImage)) {
                unlink($pathImage);
            }
            $image = $file->getClientOriginalName();
            $repeatImage = "images/post/" . $image;
            if (file_exists($repeatImage)) {
                $image = bin2hex(random_bytes(10)) . $image;
            }
            $file->move("images/post", $image);
            $post->image = $image;
        } else {
            $imageName = $post->image;
            $post->image = $imageName;
        }
        $post->save();
        return redirect()->route('Post.index');
    }

    public function destroy($post)
    {
        $post = Post::findOrFail($post);
        $pathImage = "images/post/" . $post->image;
        unlink($pathImage);
        Post::destroy($post->id);
        return redirect()->route('Post.index');
    }
}
