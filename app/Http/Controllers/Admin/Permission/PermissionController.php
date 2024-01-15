<?php

namespace App\Http\Controllers\Admin\Permission;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    private $permissions;
    public function __construct(Permission $permission){
        $this->permissions = $permission;
    }
    public function create(){
        return view('admin.permission.add');
    }
    public function store(Request $request){
        $permission = $this->permissions->create([
            'name' => $request->module_parent,
            'display_name' => $request->module_parent,
            'parent_id' => 0,
            'key_code' => '',

        ]);
        foreach ($request->module_child  as $child) {
            $this->permissions->create([
            'name' => $request->module_parent . ' ' . $child ,
            'display_name' => $request->module_parent . ' ' .$child ,
            'parent_id' => $permission->id,
            'key_code'=> $request->module_parent .'_' .$child ,
        ]);
        }
        return redirect()->back()->with('success','Create Successful');
    }
}