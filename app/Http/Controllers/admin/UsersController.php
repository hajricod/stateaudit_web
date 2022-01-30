<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UsersController extends Controller
{
    protected function isAuthorized() {

        $group = Group::find(Auth::user()->group_id);

        if (Gate::denies('group-admin', $group)) {

            abort(403);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $this->isAuthorized();
        checkRole('view');

        $users = User::orderBy('created_at', 'desc')->paginate(10)->onEachSide(1);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->isAuthorized();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->isAuthorized();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->isAuthorized();

        $groups = Group::all();
        return view('admin.users.show', compact('user', 'groups'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->isAuthorized();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->isAuthorized();

        $user->touch();
        $user->update($this->validateUser($request));
        return redirect()->back()->with('message', __('Details were updated successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Request $request)
    {
        $this->isAuthorized();

        if($request->ajax()) {
            
            $user->delete();
        }else {

            $user->delete();
            return redirect()->back()->with('message', __('Record was deleted!'));
        }
    }

    public function fetch_data(Request $request)
    {
        $this->isAuthorized();
        
        if($request->ajax()) {
            $sort_by = $request->get('sortby') ? $request->get('sortby') : 'created_at';
            $sort_type = $request->get('sorttype') ? $request->get('sorttype') : 'desc';
            $per_page = $request->get('perpage') ? $request->get('perpage') : 10;
            $search = str_replace(" ", "%", $request->get('search'));
            $users = User::
            where('name', 'like', '%'.$search.'%')
            ->orWhere('email', 'like', '%'.$search.'%')
            ->orWhere('created_at', 'like', '%'.$search.'%')
            ->orderBy($sort_by, $sort_type)
            ->paginate($per_page)
            ->onEachSide(1);
            return view('admin.users.data', compact('users'));
        }
    }

    protected function validateUser($request) {
        $fields = [
            'name'         => 'required',
            'password'     => 'string|min:8|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
        ];

        if(!$request->password) {
            unset($fields['password']);
        }

        $data = request()->validate($fields);

        $data['password'] = Hash::make($request->password);

        return $data;
    }

    public function check(Request $request)
    {
        $email = $request->email;
        $pass = $request->password;

        $auth = auth()->attempt(['email' => $email, 'password' => $pass]);

        if(auth()->attempt(['email' => $email, 'password' => $pass])){
            return response()->json([1]);
        }else {
            return response()->json([3]);
        }
    }
}
