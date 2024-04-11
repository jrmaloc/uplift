<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $permissions = Permission::all();
        $roles = Role::all();
        $data = User::all();

        if ($request->ajax()) {
            $users = User::all();

            $data = $users;

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn("role", function ($data) {
                    $role = Role::where('id', $data->role_id)->first();

                    return $role->name;
                })
                ->addColumn('actions', function ($data) {
                    return '<div>
                                <a href="javascript:void(0);" id="' . $data->id . '" class="btn btn-outline-secondary btn-sm edit-btn"><i class="bx bx-edit"></i></a>
                            </div>';
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('roles.index', [
            'permissions' => $permissions,
            'data' => $data,
            'selected' => $permissions,
            'roles' => $roles,
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
        if ($request->ajax()) {
            if ($request->from === 'save') {
                $user = User::findOrFail($request->userID);
                $role = Role::findOrFail($request->roleID);

                $user->role_id = $role->id;
                $user->save();

                // Sync roles
                $syncedRoles = $user->syncRoles([$role->name]);

                // Sync permissions
                $permissions = $user->syncPermissions($request->permissions);

                if ($syncedRoles && $permissions) {
                    return response()->json([
                        'status' => 200,
                        'user' => $user,
                        'role' => $role,
                        'permissions' => $request->permissions,
                    ]);
                } else {
                    return response()->json([
                        'status' => 500,
                        'message' => 'Failed to sync roles or permissions.',
                    ]);
                }
            } elseif ($request->from === 'input') {
                $role = Role::findOrFail($request->roleID);

                if (!$role) {
                    // Handle case where role is not found
                    abort(404);
                }

                $permissions = $role->getAllPermissions();

                if (!$permissions) {
                    abort(404);
                }

                return response()->json([
                    'permissions' => $permissions,
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        if ($request->ajax()) {
            if ($request->from == 'show') {
                $user = User::findOrFail($id);
                $permissions = $user->permissions;

                $role = Role::where('id', $user->role_id)->first();

                return response()->json([
                    'role' => $role,
                    'permissions' => $permissions,
                    'data' => $user,
                ]);
            } elseif ($request->from == 'edit') {
                $permissions = $request->data;

                $id = $request->id;

                $user = User::findOrFail($id);

                if ($user) {
                    $saved = $user->syncPermissions($permissions);

                    if ($saved) {
                        return response()->json([
                            'status' => 200,
                        ]);
                    }
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

        dd($id);
    }
}
