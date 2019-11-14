<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Role;
use App\RoleUser;

class RoleController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware('isAdmin');
    }

    public function index()
    {
        $roles = Role::all();
        return view('role.index', ['data' => $roles]);
    }

    public function create()
    {
        return view('role.create');
    }

    public function store(Request $request)
    {
        $role = Role::where('name', $request->name)->first();
        if ($role)
        {
            return redirect()->route('role')->with(['message' => "user with that name already exists"]);
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
        return view('role.edit', ['data' => $role]);
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
            return redirect()->route('role')->with('message', "can't delete role admin or seller or customer");
        }
        $RoleUsers = RoleUser::where('role_id', $request->id)->get();
        $customer_role_id = Role::where('name', 'customer')->first()->id;
        foreach ($RoleUsers as $RoleUser) {
            $RoleUser->user_id = $customer_role_id;
            $RoleUser->save();
        }
        $role->delete();

        return redirect()->route('role')->with('message', "delete success");
    }
}
