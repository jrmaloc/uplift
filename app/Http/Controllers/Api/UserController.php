<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function index(Request $request)
    {

        return response()->json('ang wewak ni joe');
    }
}
