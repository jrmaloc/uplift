<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DashboardPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {
            $data = Post::all();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn("creator", function ($post) {
                    return $post->user->name; // Access the user's name via the relationship
                })
                ->addColumn("tags", function ($post) {
                    return implode(', ', json_decode($post->tags)); // Assuming 'tags' is a JSON string
                })
                ->addColumn("actions", function ($info) {
                    $editButton = '<a href="posts/' . $info->id . '/edit" class="btn btn-outline-secondary btn-sm"><i class="tf-icons bx bx-edit"></i></a>';
                    $deleteButton = '<a href="javascript:void(0);" id="' . $info->id . '" class="btn btn-outline-danger remove-btn btn-sm"><i class="tf-icons bx bx-trash"></i></a>';

                    return '<div class="dropdown flex gap-2">' . $editButton . $deleteButton . '</div>';
                })
                ->rawColumns(['actions'])

                ->make(true);
        }

        return view('dashboard.posts.index');
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

        // if ($request->ajax() && $request->data == 'react') {
        //     $post = Post::findOrFail($request->id);
        //     $user_id = $request->userId;

        //     $reactions = json_decode($post->reaction_count, true);

        //     if ($reactions == null) {
        //         $reactions = [];
        //     }

        //     if ($request->value === "true") {

        //         array_push($reactions, $user_id);
        //         $count = count($reactions);
        //         $json = json_encode($reactions);
        //         $post->reaction_count = $json;
        //         $post->save();

        //         return response()->json([
        //             'status' => 200,
        //             'reactCount' => $count,
        //             'value' => 'true',
        //         ]);

        //     } elseif ($request->value === "false") {

        //         $index = array_search($user_id, $reactions);
        //         unset($reactions[$index]);
        //         $count = count($reactions);
        //         $json = json_encode($reactions);
        //         $post->reaction_count = $json;
        //         $post->save();

        //         return response()->json([
        //             'status' => 200,
        //             'reactCount' => $count,
        //             'value' => 'false',
        //         ]);
        //     }
        // }
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

        return view('dashboard.posts.edit', compact('post', 'tags', 'options'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all(), $id);

        if ($request->ajax()) {

            // dd($request->all());
            // dd($request->tags);
            $post = Post::findOrFail($id);

            $photos = [];
            for ($i = 1; $i <= 3; $i++) {
                if ($request->hasFile('upload' . $i)) {
                    $file = $request->file('upload' . $i);
                    $uniqueId = uniqid();

                    if ($file->isValid()) {
                        $photo = 'avatars/' . time() . $uniqueId . '.' . $file->getClientOriginalExtension();
                        $file->move(public_path('avatars'), $photo);
                        $photos[$i - 1] = $photo; // Assign photo path to corresponding index
                    }
                }
            }

            dd($photos);

            if ($post->photos == null) {
                $post->photos = '[]';
            }

            $data = json_decode($post->photos, true);

            foreach ($photos as $photo) {
                $max_length = 3;

                array_push($data, $photo);

                if (count($data) > $max_length) {
                    array_shift($data);
                }
            }

            $uploads = json_encode($data);
            $tags = json_encode($request->tags);

            $post->caption = $request->caption;
            $post->description = $request->content;
            $post->tags = $tags;
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
