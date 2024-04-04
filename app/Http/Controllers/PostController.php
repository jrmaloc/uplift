<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class PostController extends Controller
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
                ->addColumn("actions", function ($info) {
                    $editButton = '<a href="posts/' . $info->id . '/edit" class="btn btn-outline-secondary btn-sm"><i class="tf-icons bx bx-edit"></i></a>';
                    $deleteButton = '<a href="javascript:void(0);" id="' . $info->id . '" class="btn btn-outline-danger remove-btn btn-sm"><i class="tf-icons bx bx-trash"></i></a>';

                    return '<div class="dropdown flex gap-2">' . $editButton . $deleteButton . '</div>';
                })
                ->rawColumns(['actions'])

                ->make(true);
        }

        return view('posts.index');
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

        if ($request->ajax() && $request->data == 'react') {
            $post = Post::findOrFail($request->id);
            $user_id = $request->userId;

            $reactions = json_decode($post->reaction_count, true);

            if ($reactions == null) {
                $reactions = [];
            }

            if ($request->value === "true") {

                array_push($reactions, $user_id);
                $count = count($reactions);
                $json = json_encode($reactions);
                $post->reaction_count = $json;
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
                $post->reaction_count = $json;
                $post->save();

                return response()->json([
                    'status' => 200,
                    'reactCount' => $count,
                    'value' => 'false',
                ]);
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

        return view('posts.edit');
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
