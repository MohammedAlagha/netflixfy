<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\RoleRequest;
use App\Role;
use DataTables;


class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:read_roles')->only(['read','show']);
        $this->middleware('permission:create_roles')->only(['create','store']);
        $this->middleware('permission:update_roles')->only(['edit','update']);
        $this->middleware('permission:delete_roles')->only(['destroy']);
    }


    public function index()
    {
        return view('dashboard.roles.index');

    }//end f index

    public function data()
    {
        $roles = Role::whereRoleNot('super_admin')->withCount('users')->get();
        return DataTables::of($roles)->addColumn('action',function($role){

            if (auth()->user()->can(['update_roles','delete_roles'],true)) {
                return "<a class='btn btn-xs btn-primary edit' href='" . route('dashboard.roles.edit', $role->id) . "' data-value = '" . $role->name . "'><i class='fa fa-edit'></i></a>
                <a class='btn btn-xs btn-danger delete'  data-id= '$role->id' data-url='" . route('dashboard.roles.destroy', $role->id) . "'><i class='fa fa-trash'></i></a>
                <a class='btn btn-xs btn-success show'   href='". route('dashboard.roles.show',$role->id) ."'><i class='fa fa-eye'></i></a>";

            }elseif(auth()->user()->can('update_roles')){
                return "<a class='btn btn-xs btn-primary edit' href='" . route('dashboard.roles.edit', $role->id) . "' data-value = '" . $role->name . "'><i class='fa fa-edit'></i></a>
                <a class='btn btn-xs btn-danger delete disabled'><i class='fa fa-trash'></i></a>
                <a class='btn btn-xs btn-success show'   href='". route('dashboard.roles.show',$role->id) ."'><i class='fa fa-eye'></i></a>";
            }elseif(auth()->user()->can('delete_roles')){
                return "<a class='btn btn-xs btn-primary edit disabled' ><i class='fa fa-edit'></i></a>
                <a class='btn btn-xs btn-danger delete'  data-id= '$role->id' data-url='" . route('dashboard.roles.destroy', $role->id) . "'><i class='fa fa-trash'></i></a>
                <a class='btn btn-xs btn-success show'   href='". route('dashboard.roles.show',$role->id) ."'><i class='fa fa-eye'></i></a>";
            }else {
                return "<a class='btn btn-xs btn-primary edit disabled' ><i class='fa fa-edit'></i></a>
                <a class='btn btn-xs btn-danger delete disabled'><i class='fa fa-trash'></i></a>
                <a class='btn btn-xs btn-success show'   href='". route('dashboard.roles.show',$role->id) ."'><i class='fa fa-eye'></i></a>";
            }


        })->addColumn('user_count',function($role){
            return $role->users_count;
        })->rawColumns(['action','user_count'])->make(true);

    }


    public function create()
    {
        return view('dashboard.roles.create');
    }

    public function store(RoleRequest $request)
    {
       $role = Role::create($request->all());

        $role->attachPermissions($request->permissions);
        session()->flash('success','Added Successfully');
        return redirect()->route('dashboard.roles.index');
    }//end of store


    public function show(Role $role)
    {
        return view('dashboard.roles.show',compact('role'));
    }


    public function edit(Role $role)
    {
        return view('dashboard.roles.edit',compact('role'));
    }


    public function update(RoleRequest $request, Role $role)
    {

        $role->update($request->all());

        $role->syncPermissions($request->permissions);

        session()->flash('success','Edited Successfully');
        return redirect()->route('dashboard.roles.index');

    }


    public function destroy(Role $role)
    {

        $role->delete();
        // session()->flash('success','Deleted Successfully');
        // return redirect()->route('dashboard.roles.index');

        return \response()->json(['status'=>true,'message'=>'Deleted Successfully']);

    }
}
