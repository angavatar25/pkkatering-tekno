<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Role;
use App\RoleUser;

class RoleController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware('isRole:admin');
    }

    public function index()
    {
        $roles = Role::all();
        return view('admin.role.index', ['data' => $roles]);
    }

    public function create()
    {
        return view('admin.role.create');
    }

    public function store(Request $request)
    {
        $role = Role::where('name', $request->name)->first();
        if ($role)
        {
            return redirect()->route('role')->with(['message' => "role with that name already exists"]);
        }
        $role = new Role();
        $role->name = $request->name;
        $role->description = $request->description;
        $role->save();
        
        return redirect()->route('role');
    }

    public function edit(Request $request)
    {
        $role = Role::find($request->id);
        return view('admin.role.edit', ['data' => $role]);
    }

    public function update(Request $request)
    {
        $role = Role::find($request->id);
        $role->description = $request->description;
        $role->save();

        return redirect()->route('role');
    }

    public function delete(Request $request)
    {
        $role = Role::find($request->id);
        if($role->name == 'admin' || $role->name == 'seller' || $role->name == 'customer'){
            return redirect()->route('role')->with(['message' => "can't delete role admin or seller or customer"]);
        }
        $RoleUsers = RoleUser::where('role_id', $request->id)->get();
        $customer_role_id = Role::where('name', 'customer')->first()->id;
        foreach ($RoleUsers as $RoleUser) {
            $RoleUser->user_id = $customer_role_id;
            $RoleUser->save();
        }
        $role->delete();

        return redirect()->route('role')->with(['message' => "delete success"]);
    }

    public function assignee($id)
    {
        $roles = Role::all();
        $users = User::all();
        $role_users = RoleUser::where('role_id', '!=', $id)->get();

        $data = [];
        foreach ($role_users as $role_user) {
            $temp = new \stdClass();
            $temp->role_id = $role_user->role_id;
            $temp->user_id = $role_user->user_id;
            
            foreach ($roles as $role) {
                if ($temp->role_id == $role->id) {
                    $temp->role = $role->name;
                    break;
                }
            }

            foreach ($users as $user) {
                if ($temp->user_id == $user->id) {
                    $temp->user = $user->name;
                    break;
                }
            }

            if($temp->user == 'admin') {
                continue;
            }

            array_push($data, $temp);
        }
        return view('admin.role.assignee', ['data' => $data, 'id' => $id]);
    }

    public function assign(Request $request)
    {
        if (!isset($request->user_id))
        {
            return redirect()->route('role')->with(['message' => 'none selected']);
        }

        foreach ($request->user_id as $user_id) {
            $role_user = RoleUser::where('user_id', $user_id)->first();
            $role_user->role_id = $request->id;
            $role_user->save();
        }

        return redirect()->route('role')->with(['message' => 'role assigned']);
    }
}
