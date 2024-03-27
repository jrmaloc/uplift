<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        if ($request->ajax()) {
            $request->validate([
                'comment' => 'required',
            ]);

            $user_id = Auth::user()->id;

            $comment = Comment::create([
                'comments' => $request->comment,
                'post_id' => $request->post_id,
                'user_id' => $user_id,
            ]);

            if ($comment) {
                return response()->json([
                   'success' => true,
                   'status' => 200,
                    'comment' => $comment,
                    'user_id' => $user_id,
                ]);
            } else {
                return response()->json([
                   'success' => false,
                   'status' => 500,
                   'message' => 'Something went wrong. Please try again',
                ], 500);
            }
        }
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
