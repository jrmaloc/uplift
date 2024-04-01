<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
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
        if ($request->ajax() && $request->data == 'comment') {
            dd('wewew');
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
                $user = User::findOrFail($comment->user_id);
                return response()->json([
                    'success' => true,
                    'status' => 200,
                    'comments' => $comment,
                    'user' => $user,
                    'post_id' => $request->post_id,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'status' => 500,
                    'message' => 'Something went wrong. Please try again',
                ], 500);
            }
        } else if ($request->ajax() && $request->data == 'react') {
            $comment = Comment::findOrFail($request->id);
            $user_id = $request->userId;

            $reactions = json_decode($comment->reaction_count, true);

            if ($reactions == null) {
                $reactions = [];
            }

            if ($request->value === "true") {

                array_push($reactions, $user_id);
                $count = count($reactions);
                $json = json_encode($reactions);
                $comment->reactions = $json;
                $comment->save();

                return response()->json([
                    'status' => 200,
                    'reactCount' => $count,
                ]);

            } elseif ($request->value === "false") {

                $index = array_search($user_id, $reactions);
                unset($reactions[$index]);
                $count = count($reactions);
                $json = json_encode($reactions);
                $comment->reactions = $json;
                $comment->save();

                return response()->json([
                    'status' => 200,
                    'reactCount' => $count,
                ]);
            }
        } else {
            dd($request->all());
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
        if ($request->ajax() && $request->data == 'update') {

            $comment = Comment::findOrFail($id);

            if ($comment) {
                $comment->comments = $request->comment;
                $save = $comment->save();

                if ($save) {
                    return response()->json([
                        'success' => true,
                        'status' => 200,
                        'message' => 'Comment updated successfully',
                        'comment' => $request->comment,
                        'id' => $id,
                    ]);
                } else {
                    return response()->json([
                       'success' => false,
                       'status' => 500,
                       'message' => 'Something went wrong. Please try again',
                    ], 500);
                }
            } else {
                return response()->json([
                   'success' => false,
                   'status' => 500,
                   'message' => "Comment can't be found.",
                ], 500);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        //
        if ($request->ajax() && $request->data == 'delete') {
            $comment = Comment::findOrFail($id);
            $delete = $comment->delete();

            if ($delete) {
                return response()->json([
                    'success' => true,
                    'status' => 200,
                    'message' => 'Comment deleted successfully',
                ], 200);
            }
        }
    }
}
