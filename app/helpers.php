<?php

use App\Models\Group;
use App\Models\UserRole;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

if (!function_exists('lang')) {
    function lang()
    {
        return App::getLocale();
    }
}

if (!function_exists('checkRole')) {
    function checkRole($required_role)
    {
        $user_roles = auth()->user()->userRoles;
        $roles = []; 

        foreach ($user_roles as $user_role) {
            $roles[] = $user_role->role->code;
        }

        if(!in_array($required_role, $roles)) {
            abort(403, __('You don\'t have permission to') .' '. __($required_role));
        }
    }
}

if (!function_exists('checkPermission')) {
    function checkPermission($required_role)
    {
        $user_roles = UserRole::join('roles', 'user_role.role_id', '=', 'roles.id')
        ->join('groups', 'user_role.group_id', '=', 'groups.id')
        ->select('user_role.user_id', 'groups.code as group', 'roles.code as role')
        ->where('user_role.user_id', auth()->user()->id)
        ->get();

        $roles = []; 

        foreach ($user_roles as $user_role) {
            $roles[] = $user_role->group . "." .$user_role->role;
        }

        // if the required role ment for admin, then check if 
        // an admin can view, update, delete, or create
        // otherwise any admin role allow to access all sections
        
        // if(strpos($required_role, "admin")+1 == true) {

        //     foreach ($roles as $role) {

        //         if(strpos($role, "admin") >= 0){

        //             return true;
        //         }
        //     }
        // }

        if(!in_array($required_role, $roles)) {

            $index     = strpos($required_role, ".");
            $role_text = substr($required_role, $index+1);

            abort(403, __('You don\'t have permission to') .' '. __($role_text));
        }

        return true;
    }
}

if (!function_exists('userRole')) {
    function userRole($required_role)
    {
        // $user_roles = auth()->user()->userRoles;
        // $roles = []; 

        // foreach ($user_roles as $user_role) {
        //     $roles[] = $user_role->role->code;
        // }

        $user_roles = UserRole::join('roles', 'user_role.role_id', '=', 'roles.id')
        ->join('groups', 'user_role.group_id', '=', 'groups.id')
        ->select('user_role.user_id', 'groups.code as group', 'roles.code as role')
        ->where('user_role.user_id', auth()->user()->id)
        ->get();

        $roles = []; 

        foreach ($user_roles as $user_role) {
            $roles[] = $user_role->group . "." .$user_role->role;
        }

        if(!in_array($required_role, $roles)) {
            return false;
        }

        return true;
    }
}

if (!function_exists('checkGroup')) {
    function checkGroup()
    {
        $group = Group::find(Auth::user()->group_id);

        if (Gate::denies('group-complaint', $group)) {

            abort(403);
        }
    }
}

