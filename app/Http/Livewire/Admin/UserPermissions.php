<?php

namespace App\Http\Livewire\Admin;

use App\Models\Group;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Livewire\Component;

class UserPermissions extends Component
{
    public $userid;
    public $groups;
    public $roles;
    public $user;
    public $userRoles;

    public function mount() {
        $this->user = new User();
        $this->groups = Group::all();
        $this->roles  = Role::all();
        $this->userRoles = collect();
    }

    public function roleCheck($data) {

        checkPermission('admin.update');

        $group_id = $data['groupid'];
        $role_id  = $data['roleid'];

        $user_role = UserRole::where([
            'user_id' => $this->userid,
            'group_id'=> $group_id,
            'role_id' => $role_id
        ])->get();

        if(count($user_role) > 0) {
            UserRole::where([
                'user_id' => $this->userid,
                'group_id'=> $group_id,
                'role_id' => $role_id
            ])->delete();
        }else {
            UserRole::create([
                'user_id' => $this->userid,
                'group_id'=> $group_id,
                'role_id' => $role_id
            ]);
        }

    }

    public function userRoles() {
        return UserRole::join('roles', 'user_role.role_id', '=', 'roles.id')
        ->join('groups', 'user_role.group_id', '=', 'groups.id')
        ->select('user_role.user_id', 'groups.code as group', 'roles.code as role')
        ->where('user_role.user_id', $this->userid)
        ->get();
    }

    public function render()
    {

        return view('livewire.admin.user-permissions', [
            'groups'     => $this->groups,
            'roles'      => $this->roles,
            'userroles'  => $this->userRoles(),
        ]);
    }
}
