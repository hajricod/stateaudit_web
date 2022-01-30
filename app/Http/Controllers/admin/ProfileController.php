<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
        
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
        
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user_id = auth()->user()->id;
        $userRoles = UserRole::join('roles', 'user_role.role_id', '=', 'roles.id')
        ->join('groups', 'user_role.group_id', '=', 'groups.id')
        ->select('user_role.group_id','groups.code as group', 'roles.code as role')
        ->where('user_role.user_id', $user_id)
        ->orderBy('group_id')
        ->get();

        $groups = $userRoles->pluck('group', 'group_id')->unique();

        $permissions = [];

        foreach ($groups as $key => $value) {
            $permissions[$value] = [
                UserRole::join('roles', 'user_role.role_id', '=', 'roles.id')
                ->join('groups', 'user_role.group_id', '=', 'groups.id')
                ->select('groups.code as group', 'roles.code as role')
                ->where([
                    'user_id' => $user_id,
                    'group_id'=> $key
                ])
                ->orderBy('group_id')
                ->get()
            ];
        }

        // dd($permissions);

        $fields = [
            'id',
            'name',
            'email',
            'created_at',
            'updated_at'
        ];

        $user = User::find(Auth::user()->id);
        $group = Group::find($user->group_id);

        return view('admin.profile.show', compact('user', 'group', 'userRoles', 'permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
        
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find(Auth::user()->id);
        $user->touch();
        $user->update($this->validateUser($request));
        return redirect()->back()->with('message', __('Details were updated successfully!'));
        
    }

    protected function validateUser($request) {
        $data = [];
        $fields = [
            'name'         => 'required',
            'password'     => 'string|min:8|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
        ];

        if(!$request->password) {
            unset($fields['password']);
            $data = request()->validate($fields);
        }else {
            $data = request()->validate($fields);
            $data['password'] = Hash::make($request->password);
        }

        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
        
    // }
}
