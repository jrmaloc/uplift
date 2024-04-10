<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {
            $data = User::where('role_id', 3)->get();

            return DataTables::of($data)
                ->addIndexColumn()
            // ->addColumn('household_servant', '{{$household_servant_name}}')
                ->addColumn("actions", function ($info) {
                    $editButton = '<a href="javascript:void(0);" id="' . $info->id . '" class="btn btn-outline-secondary btn-sm edit-btn"><i class="tf-icons bx bx-edit"></i></a>';
                    $deleteButton = '<a href="javascript:void(0);" id="' . $info->id . '" class="btn btn-outline-danger remove-btn btn-sm"><i class="tf-icons bx bx-trash"></i></a>';

                    return '<div class="dropdown flex gap-2">' . $editButton . $deleteButton . '</div>';
                })
                ->rawColumns(['actions'])

                ->make(true);
        }

        return view('dashboard.users.index');
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
        if ($request->ajax()) {
            $data = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'username' => 'required',
                'contact_number' => 'required',
            ]);

            $data['status'] = 'active';

            $password = Hash::make('Uplift123!');
            $data['password'] = $password;

            $data['role_id'] = Role::where('name', 'user')->first()->id;

            $user = User::create($data);
            $user->assignRole('user');

            $role = Role::where('name', 'user')->first();
            if ($role) {
                $permissions = $role->permissions;

                $user->syncPermissions($permissions);
            } else {
                abort(403);
            }

            if ($user) {
                return response()->json([
                    'status' => 200,
                    'message' => 'User Created Successfully!',
                    'data' => $user,
                ]);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => 'Something went wrong',
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
    public function edit(Request $request, string $id)
    {
        //
        if ($request->ajax()) {
            $user = User::findOrFail($id);

            return response()->json([
                'user' => $user,
            ]);
        }

        // $user = User::find($id);

        // $dob = Carbon::parse($user->birthday);

        // $age = $dob->diffInYears(Carbon::now());

        // $role = Role::find($user->role_id);

        // return view('dashboard.users.edit', [
        //     'user' => $user,
        //     'age' => $age,
        //     'role' => $role,
        // ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        if ($request->ajax()) {
            $data = $request->validate([
                'name' =>'required',
                'email' =>'required',
                'username' =>'required',
                'contact_number' =>'required',
            ]);

            $data['status'] = 'active';

            $user = User::findOrFail($id);
            $update = $user->update($data);

            if ($update) {
                return response()->json([
                    'status' => 200,
                    'message' => 'User Updated Successfully!',
                ]);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => 'Something went wrong',
                ]);
            }
        }
        // if ($request->ajax()) {
        //     $data = $request->validate([
        //         'name' => 'required',
        //         'email' => 'required|email',
        //         'username' => 'required',
        //         'contact_number' => 'required',
        //         'birthday' => 'required',
        //         'gender' => 'required',
        //         'bio' => 'required',
        //     ]);

        //     $user = User::findOrFail($id);
        //     $dob = Carbon::parse($user->birthday);

        //     $age = $dob->diffInYears(Carbon::now());

        //     $save = $user->update($data);
        //     if ($save) {
        //         return response()->json([
        //             'status' => 200,
        //             'message' => 'User Updated Successfully!',
        //             'data' => $user,
        //             'age' => $age,
        //         ]);
        //     } else {
        //         return response()->json([
        //             'status' => 500,
        //             'message' => 'Something went wrong',
        //         ], 500);
        //     }
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        //
        if ($request->ajax()) {
            $user = User::find($id);
            $deleted = $user->delete();

            if ($deleted) {
                return response()->json([
                    'status' => 200,
                    'message' => 'User Deleted Successfully',
                ]);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => 'Something went wrong. Please try again',
                ], 500);
            }
        }
    }
}
