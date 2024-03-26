<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = Auth::user();

        $dob = Carbon::parse($user->birthday);

        $age = $dob->diffInYears(Carbon::now());

        $role = Role::find($user->role_id);

        return view('profile.index', [
            'user' => $user,
            'dob' => $dob,
            'age' => $age,
            'role' => $role,
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

        // Find the user
        $data = Auth::user();
        $user = User::findOrFail($data->id);

        // Get the old avatar path
        $oldAvatarPath = $user->avatar;

        // Handle avatar upload
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            // Move the uploaded file to the desired location
            $avatar = $request->file('file');
            $filename = 'avatars/' . time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('avatars'), $filename);

            // Update the user's avatar path
            $user->avatar = $filename;
            $user->save();

            // Delete the old avatar file if it exists
            if ($oldAvatarPath && file_exists(public_path($oldAvatarPath))) {
                unlink(public_path($oldAvatarPath));
            }

            // Return the file path
            return response()->json(['path' => $filename, 'status' => 200, 'message' => 'Your picture looks great!'], 200);
        }

        // If the file is not valid, return error response
        return response()->json(['error' => 'Invalid file'], 400);
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
