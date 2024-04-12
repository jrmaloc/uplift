<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $posts = Post::with(['user', 'comments'])->orderBy('created_at', 'desc')->get();

        if ($request->ajax()) {
            $comments = Comment::where('post_id', $request->id)->get();
            $commentCount = $comments->count();

            if ($comments->isEmpty()) {
                return response()->json([
                    'status' => 500,
                    'comments' => 0,
                ]);
            } else {
                // $comments has records
                $commentData = [];
                $user_id = Auth::user()->id;

                foreach ($comments as $comment) {
                    // Decode reactions and count
                    $reactions = json_decode($comment->reactions);

                    if ($reactions == null) {
                        $reactions = [];
                    }

                    $reactionCount = count($reactions);
                    $included = in_array($user_id, $reactions);

                    // Query comment data
                    $query = Comment::where('id', $comment->id)
                        ->with('user')
                        ->whereHas('user', function ($q) use ($comment) {
                            $q->where('id', $comment->user_id);
                        });

                    $data = $query->first();
                    $data->reaction_count = $reactionCount;
                    $data->included = $included;

                    // Add comment data to the array
                    $commentData[] = $data;
                }
            }

            return response()->json([
                'comments' => $commentData,
                'commentCount' => $commentCount,
            ]);
        }

        return view('account.index', [
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
