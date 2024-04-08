<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $authId = Auth::user()->id;

        $posts = Post::where('user_id', $authId)->with('comments')->get();

        return view('my-posts.index', [
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

        $tags = json_encode($request->tags);

        $privacy = $request->privacy == null ? 'public' : 'private';

        $newPost = Post::create([
            'caption' => $request->caption,
            'description' => $request->content,
            'tags' => $tags,
            'privacy' => $privacy,
            'user_id' => Auth::user()->id,
        ]);

        if ($newPost) {
            return redirect(route('home.index'))->with([
                'status' == 200,
                'message' == 'Post Created Successfully',
            ]);
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

        $post = Post::findOrFail($id);

        $tags = json_decode($post->tags, true);
        $options = array_diff($tags, array('Faith', 'Family', 'Finance', 'Health', 'Studies', 'Work'));

        return view('account.post.edit', compact('post', 'tags', 'options'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        if ($request->ajax()) {

            $post = Post::findOrFail($id);

            $post->caption = $request->caption;
            $post->description = $request->content;
            $post->tags = json_encode($request->tags);
            $post->privacy = $request->privacy;
            $save = $post->save();

            if ($save) {
                return response()->json([
                    'post' => $post,
                    'status' => 200,
                    'message' => 'Post Updated Successfully',
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
