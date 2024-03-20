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
                                <a href="javascript:void(0);" id="' . $data->id . '" class="btn btn-outline-danger btn-sm delete-btn"><i class="bx bx-trash"></i></a>
                            </div>';
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('roles.index', [
            'permission' => $permissions,
            'data' => $data,
            'selected' => $permissions,
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

                $role = Role::where('id', $user->role_id)->first();
                $permissions = $user->getAllPermissions();

                return response()->json([
                    'role' => $role,
                    'permissions' => $permissions,
                    'data' => $user,
                ]);
            } elseif ($request->from == 'edit') {

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
