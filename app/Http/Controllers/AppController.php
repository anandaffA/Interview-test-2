<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Posts;

class AppController extends Controller
{
    public function index()
    {
        $data = DB::table('posts')->get();
        return view('app', ['posts' => $data]);
    }

    public function add(){
        return view('add');
    }

    public function show($id)
    {
        $post = DB::table('posts')->where('id', $id)->first();
        if ($post) {
            return view('show', ['post' => $post]);
        } else {
            return redirect('/')->with('error', 'Post not found');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:64',
            'body'  => 'required|string',
        ]);

        DB::table('posts')->insert([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('posts.index')->with('success', 'Post added successfully!');
    }
    
    public function edit($id)
    {
        $post = DB::table('posts')->where('id', $id)->first();
        if ($post) {
            return view('edit', ['post' => $post]);
        } else {
            return redirect('/')->with('error', 'Post not found');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:64',
            'body'  => 'required|string',
        ]);

        $updated = DB::table('posts')->where('id', $id)->update([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'updated_at' => now(),
        ]);

        if ($updated) {
            return redirect()->route('posts.show', ['id' => $id])->with('success', 'Post updated successfully!');
        } else {
            return redirect()->route('posts.index')->with('error', 'Post not found');
        }
    }
    public function delete($id)
    {
        $deleted = DB::table('posts')->where('id', $id)->delete();
        if ($deleted) {
            return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
        } else {
            return redirect()->route('posts.index')->with('error', 'Post not found');
        }
    }
}
