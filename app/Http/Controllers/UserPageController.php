<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPageController extends Controller
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
        // report user

        if ($request->ajax() && $request->data == 'report') {
            $user = User::findOrFail($request->id);
            $data = [$request->reporter, $request->reason];
            $existingReport = json_decode($user->reported_by, true);

            $report = $existingReport == null ? [] : $existingReport;

            if (!in_array($data[0], $report)) {
                $report[] = $data;
                $user->reported_by = json_encode($report);
                $save = $user->save();

                if ($save) {
                    return response()->json([
                        'success' => true,
                        'status' => 200,
                        'message' => 'The admins will now review the report. Thank you!',
                    ]);
                }
            } else {
                return response()->json([
                   'success' => false,
                   'status' => 400,
                   'message' => 'You have already reported this user.',
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
        $posts = Post::where('user_id', $id)->where('privacy', 'public')->with('comments.user')->get();
        $user = User::findOrFail($id);
        $friends = json_decode($user->friends) == null ? [] : json_decode($user->friends);
        $auth = Auth::id();

        if (!in_array($auth, $friends)) {
            $followed = 0;
        } else {
            $followed = 1;
        }

        $dateVerified = Carbon::parse($user->email_verified_at)->format('F Y');

        return view('account.user.show', [
            'posts' => $posts,
            'user' => $user,
            'dateVerified' => $dateVerified,
            'followed' => $followed,
        ]);
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

        if ($request->ajax() && $request->data == 'follow') {
            $user = User::findOrFail($id);

            $friends = json_decode($user->friends) == null ? [] : json_decode($user->friends);

            if (!in_array($request->follow, $friends)) {
                array_push($friends, $request->follow);
                $user->friends = json_encode($friends);
                $save = $user->save();

                if ($save) {
                    return response()->json([
                        'success' => true,
                        'status' => 200,
                        'message' => 'You are now following this user',
                    ]);
                }
            } else {
                $index = array_search($request->follow, $friends);
                unset($friends[$index]);
                $user->friends = json_encode($friends);
                $save = $user->save();

                if ($save) {
                    return response()->json([
                        'success' => true,
                        'status' => 201,
                        'message' => 'You are no longer following this user',
                    ]);
                }

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
