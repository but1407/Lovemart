<?php

namespace App\Http\Controllers\Admin\Role;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    private $role;
    private $permission;
    public function __construct(Role $role,Permission $permission){
        $this->role = $role;
        $this->permission = $permission;
    }



    public function index(){

        $roles = $this->role->paginate(10);
            return view('admin.role.index',compact('roles'));
        }

    public function create(){
        $permissionParent = $this->permission->where('parent_id', 0)->get();
        
        return view('admin.role.add',compact('permissionParent'));
    }
    public function store(Request $request)
    {
        $role = $this->role->create([
            'name' => $request->name,
            'display_name' => $request->display_name,

        ]);
        $role->permissions()->attach($request->permission_id);
        return redirect()->back()->with('success', 'Create Successful');
    }

    public function edit($id){
        $permissionParent = $this->permission->where('parent_id', 0)->get();
        $role = $this->role->find($id);
        $permissionChecked = $role->permissions;
        return view('admin.role.edit',compact('role', 'permissionParent','permissionChecked'));
    }
    public function update(Request $request, $id){
        $role = $this->role->find($id);
        $role->update([
            'name'=> $request->name,
            'display_name'=>$request->display_name
        ]);
        $role->permissions() -> sync($request->permission_id);
        return redirect()->route('admin.roles.index');
    }
}