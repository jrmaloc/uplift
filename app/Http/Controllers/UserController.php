<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class UserController extends Controller
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
                    $editButton = '<a href="users/' . $info->id . '/edit" class="btn btn-outline-secondary btn-sm"><i class="tf-icons bx bx-edit"></i></a>';
                    $deleteButton = '<a href="javascript:void(0);" id="' . $info->id . '" class="btn btn-outline-danger remove-btn btn-sm"><i class="tf-icons bx bx-trash"></i></a>';

                    return '<div class="dropdown flex gap-2">' . $editButton . $deleteButton . '</div>';
                })
                ->rawColumns(['actions'])

                ->make(true);
        }

        return view('users.index');
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
    public function edit(string $id)
    {
        //
        $user = User::find($id);

        $dob = Carbon::parse($user->birthday);

        $age = $dob->diffInYears(Carbon::now());



        return view('users.edit', [
            'user' => $user,
            'age' => $age,
        ]);
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
                    'message' => 'Something went wrong',
                ], 500);
            }

        }
    }
}
