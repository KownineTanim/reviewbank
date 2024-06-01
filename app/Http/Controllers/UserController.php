<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Role;
use App\Models\UserHasRole;

use Validator;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(function($request, $next){
            if (!can('Manage User')) {
                abort(403);
            }
            return $next($request);
        });
    }

    public function index()
    {
        $users = User::with(['roles.role'])->get();
        return view('pages.backend.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!can('Create User')) {
            abort(403);
        }

        $roles = Role::where('status', 'active')->get();
        return view('pages.backend.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!can('Create User')) {
            abort(403);
        }

        $validator = Validator::make($request->all(), [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'user_email' => ['required'],
            'user_password' => ['required', 'min:6'],
            'role' => ['required', 'exists:roles,id'],
            'status' => ['required']
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->withInput();
        }

        try {
            $user = new User();
            $user->first_name = $request->first_name;
            $user->last_name =  $request->last_name;
            $user->email = $request->user_email;
            $user->password = bcrypt($request->user_password);
            $user->active_role_id = $request->role;
            $user->status = $request->status;
            $user->save();

            $userHasRole = [
                'user_id' => $user->id,
                'role_id' => $request->role
            ];

            UserHasRole::insert($userHasRole);

            return redirect()
              ->route('backend.user.index')
              ->with('success', 'User : ' . $user->first_name . ' added successfully!');
        } catch (\Exception $e) {
            $validator->getMessageBag()->add('failed', $e->getMessage());
        }

        return redirect()
            ->back()
            ->withErrors($validator->errors())
            ->withInput();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (!can('Edit User')) {
            abort(403);
        }

        $userRoles = $user->roles->pluck('role_id')->toArray();
        $roles = Role::where('status', 'active')->get();
        return view('pages.backend.user.edit', compact('user', 'roles', 'userRoles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if (!can('Edit User')) {
            abort(403);
        }

        $validator = Validator::make($request->all(), [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'user_email' => ['required'],
            'role' => ['required', 'exists:roles,id'],
            'status' => ['required']
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->withInput();
        }

        try {
            $user->first_name = $request->first_name;
            $user->last_name =  $request->last_name;
            $user->email = $request->user_email;
            $user->active_role_id = $request->role;
            $user->status = $request->status;
            $user->password = !empty($request->user_password) ? bcrypt($request->user_password) : $user->password;
            $user->save();

            $userHasRole = [
                'user_id' => $user->id,
                'role_id' => $request->role
            ];

            UserHasRole::where('user_id', $user->id)->delete();
            UserHasRole::insert($userHasRole);

            return redirect()
              ->route('backend.user.edit', [$user->id])
              ->with('success', 'User : ' . $user->first_name . ' updated successfully!');
        } catch (\Exception $e) {
            $validator->getMessageBag()->add('failed', $e->getMessage());
        }

        return redirect()
            ->back()
            ->withErrors($validator->errors())
            ->withInput();
    }

    public function updateActiveRole(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => ['required', 'exists:users,id'],
            'role_id' => ['required']
        ]);

        if ($validator->fails()) {
            $message = "";
            $errors = $validator->errors();

            foreach ($errors->all() as $error) {
                $message .= $error . ' | ';
            }
            return response()->json([
                'status' => 'failed',
                'message' => $message
            ]);
        }

        try {
            $hasRole = UserHasRole::where([
                ['user_id', $request->user_id],
                ['role_id', $request->role_id]
            ])->exists();

            if ($hasRole) {
                User::where('id', $request->user_id)
                    ->update([
                        'active_role_id' => $request->role_id
                    ]);
                cache_flush_permissions();
                return response()->json([
                    'status' => 'success'
                ]);
            }

            return response()->json([
                'status' => 'failed',
                'message' => 'Permission denied!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]);
        }
    }

    public function switchRole($id)
    {
        try {
            $hasRole = UserHasRole::where([
                ['user_id', Auth::id()],
                ['role_id', $id]
            ])->exists();

            if ($hasRole) {
                User::where('id', Auth::id())
                    ->update([
                        'active_role_id' => $id
                    ]);
                cache_forget_permissions();
                return redirect()->route('home');
            }

            return redirect()->route('home');
        } catch (\Exception $e) {
            return redirect()->route('home');
        }
    }
}
