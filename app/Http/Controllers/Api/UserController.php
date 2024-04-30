<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function index(Request $request)
    {
        $post = Post::findOrFail(2);

        return response()->json([
            'post' => $post
        ]);
    }
}
