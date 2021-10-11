<?php

namespace App\Http\Controllers;

use App\Http\Requests\post\form;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if (!Auth::user()->can('viewAny',Post::class)) {
            abort(403);
        }
        $posts = Post::all();
        return View::make('post.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if (!Auth::user()->can('create',Post::class)) {
            abort(403);
        }
        return View::make('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param form $request
     * @return RedirectResponse
     */
    public function store(form $request): RedirectResponse
    {
        if (!Auth::user()->can('create',Post::class)) {
            abort(403);
        }
        Post::create([
            'title' => $request->title,
            'content' => $request->content_text,
            'thumbnail' => $request->thumbnail,
        ]);
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return Response
     */
    public function show(Post $post)
    {
        if (!Auth::user()->can('view',$post)) {
            abort(403);
        }
        return View::make('post.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return Response
     */
    public function edit(Post $post)
    {
        if (!Auth::user()->can('update',$post)) {
            abort(403);
        }
        return View::make('post.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param form $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function update(form $request, Post $post): RedirectResponse
    {
        if (!Auth::user()->can('update',$post)) {
            abort(403);
        }
        $post->update([
            'title' => $request->title,
            'content' => $request->content_text,
            'thumbnail' => $request->thumbnail,
        ]);
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return RedirectResponse
     */
    public function destroy(Post $post): RedirectResponse
    {
        if (!Auth::user()->can('delete',$post)) {
            abort(403);
        }
        $post->delete();
        return redirect()->route('post.index');
    }
}
