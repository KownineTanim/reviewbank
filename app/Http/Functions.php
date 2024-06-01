<?php
function img($path='')
{
    return \Storage::disk(config('app.storage_disk'))->url($path);
}

function prd($v='')
{
    echo "<pre>";
    print_r($v);
    die;
}

function cache_permissions()
{
    $permissionids = auth()->user()->role->permissionids();
    $permissions = \App\Models\Permission::whereIn('id', $permissionids)
        ->pluck('name')
        ->toArray();
    \Cache::put('permissions_'.auth()->id(), $permissions);
    return $permissions;
}

function cache_forget_permissions()
{
    \Cache::forget('permissions_'.auth()->id());
}

function cache_flush_permissions()
{
    \Cache::flush();
}

function get_permissions()
{
    $permissions = \Cache::get('permissions_'.auth()->id(), []);
    return $permissions;
}

function can($permission_name)
{
    $permissions = \Cache::get('permissions_'.auth()->id(), []);
    return in_array($permission_name, $permissions);
}

function get_rating_types()
{
    return ['Design', 'Quality', 'Durability', 'Price', 'Service'];
}

function authProfilePhoto()
{
    $photo = "https://ui-avatars.com/api/?background=000&color=fff&name=U";

    if (auth()->check()) {
        $authUser = auth()->user();
        $photo = "https://ui-avatars.com/api/?background=000&color=fff&name={$authUser->first_name}";

        if (!empty($authUser->profile_photo)) {
            if (strpos($authUser->profile_photo, 'http') !== false) {
                $photo = $authUser->profile_photo;
            } else {
                $photo = img($authUser->profile_photo);
            }
        }
    }

    return $photo;
}

function profilePhoto($user)
{
    $photo = "https://ui-avatars.com/api/?background=000&color=fff&name={$user->name}";

    if (!empty($user->profile_photo)) {
        if (strpos($user->profile_photo, 'http') !== false) {
            $photo = $user->profile_photo;
        } else {
            $photo = img($user->profile_photo);
        }
    }

    return $photo;
}

function request_has($uri)
{
    return strpos(request()->url(), $uri) !== false;
}

function request_is($name)
{
    return Route::is($name);
}
