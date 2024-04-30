<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $authId = Auth::user()->id;

        $posts = Post::where('user_id', $authId)->with('comments')->orderBy('created_at', 'desc')->get();

        return view('account.post.index', [
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
        // dd($request->all());

        // ------------------ REACTION METHOD ------------------------------- //

        if ($request->ajax() && $request->data == 'react') {
            $post = Post::findOrFail($request->id);
            $user_id = $request->userId;

            $reactions = json_decode($post->reactors, true);

            if ($reactions == null) {
                $reactions = [];
            }

            if ($request->value === "true") {

                array_push($reactions, $user_id);
                $count = count($reactions);
                $json = json_encode($reactions);
                $post->reactors = $json;

                $post->save();

                return response()->json([
                    'status' => 200,
                    'reactCount' => $count,
                    'value' => 'true',
                ]);

            } elseif ($request->value === "false") {

                $index = array_search($user_id, $reactions);
                unset($reactions[$index]);
                $count = count($reactions);
                $json = json_encode($reactions);
                $post->reactors = $json;
                $post->save();

                return response()->json([
                    'status' => 200,
                    'reactCount' => $count,
                    'value' => 'false',
                ]);
            }
        }

        // $data = [];
        // $data[] = $request->photo_upload1;
        // $data[] = $request->photo_upload2;
        // $data[] = $request->photo_upload3;

        // $photos = json_encode($data);
        $tags = json_encode($request->tags);

        $privacy = $request->privacy == null ? 'public' : 'private';
        $data = [];
        $photos = json_encode($data);

        if (
            ($request->hasFile('photo_upload1') && $request->file('photo_upload1')->isValid()) ||
            ($request->hasFile('photo_upload2') && $request->file('photo_upload2')->isValid()) ||
            ($request->hasFile('photo_upload3') && $request->file('photo_upload3')->isValid())) {

            // Move the uploaded file to the desired location
            $uploads = [];
            for ($i = 1; $i <= 3; $i++) {
                $fileKey = 'photo_upload' . $i;
                if ($request->hasFile($fileKey)) {
                    $file = $request->file($fileKey);
                    // Generate a unique file name
                    $fileName = 'avatars/' . time() . '_' . $i . '.' . $file->getClientOriginalExtension();
                    // Move the uploaded file to the desired location
                    $file->move(public_path('avatars'), $fileName);
                    // Store the file name in the uploads array
                    $uploads[] = $fileName;
                }
            }

            $photos = json_encode($uploads);
        }

        $newPost = Post::create([
            'caption' => $request->caption,
            'description' => $request->content,
            'tags' => $tags,
            'privacy' => $privacy,
            'user_id' => Auth::user()->id,
            'photos' => $photos,
        ]);

        if ($newPost) {
            return redirect(route('account.home.index'))->with([
                'status' => 200,
                'message' => 'Post Created Successfully',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        // report
    }

    public function report(Request $request, string $id)
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

        $data = json_decode($post->tags, true);

        $tags = $data == null ? [] : $data;

        $options = array_diff($tags, array('Faith', 'Family', 'Finance', 'Health', 'Studies', 'Work'));

        // dd($post->photos);

        return view('account.post.edit', compact('post', 'tags', 'options'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        if ($request->ajax()) {

            // dd($request->all());
            // dd($request->tags);
            $post = Post::findOrFail($id);
            $photos = [];
            if ($request->hasFile('uploads')) {
                $files = $request->file('uploads');

                foreach ($files as $file) {
                    $uniqueId = uniqid();

                    if ($file->isValid()) {
                        $photo = 'avatars/' . time() . $uniqueId . '.' . $file->getClientOriginalExtension();
                        $file->move(public_path('avatars'), $photo);

                        $photos[] = $photo;
                    } else {
                        // File is not valid
                        abort(500);
                    }
                }
            }
            $data = json_decode($post->photos, true);

            foreach ($photos as $photo) {
                $max_length = 3;

                array_push($data, $photo);

                if (count($data) > $max_length) {
                    array_shift($data);
                }
            };

            $uploads = json_encode($data);
            $tags = json_encode($request->tags);

            $post->caption = $request->caption;
            $post->description = $request->content;
            $post->tags = json_encode($request->tags);
            $post->privacy = $request->privacy;
            if ($uploads !== '[]') {
                $post->photos = $uploads;
            }
            $post->tags = $tags;
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
