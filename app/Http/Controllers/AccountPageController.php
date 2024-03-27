<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class AccountPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $posts = Post::all();

        if ($request->ajax()) {
            $comments = Comment::where('post_id', $request->id)->get();

            if ($comments->isEmpty()) {
                return response()->json([
                    'status' => 500,
                    'comments' => 0
                ]);
            } else {
                // $comments has records
                foreach ($comments as $comment) {
                    $user_id = $comment->user_id;
                }

                $query = Comment::where('post_id', $request->id)->with('user')
                    ->whereHas('user', function ($q) use ($user_id) {
                        $q->where('id', $user_id);
                    });

                $commentData = $query->get();
            }

            return response()->json([
                'comments' => $commentData,
            ]);
        }

        return view('account-page.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
