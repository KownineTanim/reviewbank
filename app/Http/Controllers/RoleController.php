<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Role;
use App\Models\Permission;
use App\Models\RoleHasPermission;

use Validator;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(function($request, $next){
            if (!can('Manage Role')) {
                abort(403);
            }
            return $next($request);
        });
    }

    public function index()
    {
        $roles = Role::get();
        return view('pages.backend.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!can('Create Role')) {
            abort(403);
        }

        $permissions = Permission::get()->toArray();
        $permissionCategories = [];

        foreach ($permissions as $permission) {
            if (!array_key_exists($permission['category'], $permissionCategories)) {
                $permissionCategories[$permission['category']] = [];
            }

            $permissionCategories[$permission['category']][] = (object)$permission;
        }
        return view('pages.backend.role.create', compact('permissionCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!can('Create Role')) {
            abort(403);
        }

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'unique:roles,name']
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->withInput();
        }

        $role = new Role();
        $role->name = $request->name;
        $role->save();

        $roleHasPermission = [];
        $permissions = $request->permissions ?? [];

        if (count($permissions)) {
            foreach ($permissions as $permissionId) {
                $roleHasPermission[] = [
                    'permission_id' => $permissionId,
                    'role_id' => $role->id
                ];
            }

            RoleHasPermission::insert($roleHasPermission);
        }


        $validator->getMessageBag()->add('success', 'Added Successfully!');
        return redirect()
            ->route('backend.role.index')
            ->with('success', 'Created Successfully!')
            ->withInput();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        if (!can('Edit Role')) {
            abort(403);
        }

        $permissions = Permission::get()->toArray();
        $permissionCategories = [];
        $existingPermissionIds = $role->permissionids();

        foreach ($permissions as $permission) {
            if (!array_key_exists($permission['category'], $permissionCategories)) {
                $permissionCategories[$permission['category']] = [];
            }

            $permissionCategories[$permission['category']][] = (object)$permission;
        }

        return view('pages.backend.role.edit', compact('role', 'permissionCategories', 'existingPermissionIds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        if (!can('Edit Role')) {
            abort(403);
        }
        
        $roleHasPermission = [];
        $permissions = $request->permissions ?? [];
        RoleHasPermission::where('role_id', $role->id)->delete();

        if (count($permissions)) {
            foreach ($permissions as $permissionId) {
                $roleHasPermission[] = [
                    'permission_id' => $permissionId,
                    'role_id' => $role->id
                ];
            }


            RoleHasPermission::insert($roleHasPermission);
        }
        cache_flush_permissions();
        cache_permissions();

        return redirect()
            ->route('backend.role.index')
            ->with('success', 'Updated Successfully!')
            ->withInput();
    }
}
