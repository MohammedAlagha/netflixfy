<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\Dashboard\UserRequest;
use App\Role;
use DataTables;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:read_users')->only(['read']);
        $this->middleware('permission:create_users')->only(['create','store']);
        $this->middleware('permission:update_users')->only(['edit','update']);
        $this->middleware('permission:delete_users')->only(['destroy']);
    }


    public function index()
    {
        return view('dashboard.users.index');
    } //end of index

    public function data()
    {
        $users = User::whereRoleNot('super_admin')->get();
        return DataTables::of($users)->addColumn('action', function ($user) {

        if (auth()->user()->can(['update_users','delete_users'],true)) {
            return "<a class='btn btn-xs btn-primary edit' href='" . route('dashboard.users.edit', $user->id) . "' data-value = '" . $user->name . "'><i class='fa fa-edit'></i></a>
            <a class='btn btn-xs btn-danger delete'  data-id= '$user->id' data-url='" . route('dashboard.users.destroy', $user->id) . "'><i class='fa fa-trash'></i></a>";

        }elseif(auth()->user()->can('update_users')){
            return "<a class='btn btn-xs btn-primary edit' href='" . route('dashboard.users.edit', $user->id) . "' data-value = '" . $user->name . "'><i class='fa fa-edit'></i></a>
            <a class='btn btn-xs btn-danger delete disabled'><i class='fa fa-trash'></i></a>";
        }elseif(auth()->user()->can('delete_users')){
            return "<a class='btn btn-xs btn-primary edit disabled' ><i class='fa fa-edit'></i></a>
            <a class='btn btn-xs btn-danger delete'  data-id= '$user->id' data-url='" . route('dashboard.users.destroy', $user->id) . "'><i class='fa fa-trash'></i></a>";
        }else {
            return "<a class='btn btn-xs btn-primary edit disabled' ><i class='fa fa-edit'></i></a>
            <a class='btn btn-xs btn-danger delete disabled'><i class='fa fa-trash'></i></a>";
        }
        })->addColumn('roles', function ($user) {
            $result = '';
            foreach ($user->roles as $role) {
                $result .= '<h5 style="display:inline-block"><span class="badge badge-primary ml-1">' . $role->name . '</span></h5>';
            };
            return $result;
        })->rawColumns(['roles', 'action'])->make(true);
    }


    public function create()
    {
        $roles = Role::whereRoleNot(['super_admin', 'admin'])->get();
        return view('dashboard.users.create', compact('roles'));
    }

    public function store(UserRequest $request)
    {

//        $request->merge(['password' => bcrypt($request->password)]);      I write method in user model instead of this line

        $user = User::create($request->all());

        $user->attachRoles(['admin', $request->role_id]);

        session()->flash('success', 'Added Successfully');
        return redirect()->route('dashboard.users.index');
    }

    public function edit(User $user)
    {
        $roles = Role::whereRoleNot(['super_admin', 'admin'])->get();
        return view('dashboard.users.edit', compact('user', 'roles'));
    }


    public function update(UserRequest $request, User $user)
    {


        $user->update($request->all());

        $user->syncRoles(['admin', $request->role_id]);


        session()->flash('success', 'Edited Successfully');
        return redirect()->route('dashboard.users.index');
    }


    public function destroy(User $user)
    {

        $user->delete();
        // session()->flash('success','Deleted Successfully');
        // return redirect()->route('dashboard.users.index');

        return \response()->json(['status' => true, 'message' => 'Deleted Successfully']);
    }
}
