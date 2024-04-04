<?php
namespace App\Modules\System\Main\Controllers;
use App\Http\Controllers\Controller;
use App\Modules\System\Main\Models\PermissionGroup;
use App\Modules\System\Main\Models\Role;
use App\Modules\System\Main\Requests\RoleStoreRequest;
use App\Modules\System\Main\Requests\RoleUpdateRequest;
use App\Modules\System\Main\Services\RoleService;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('modules_system_main::roles.index', compact('roles'));
    }
    public function create()
    {
        return view('modules_system_main::roles.create');
    }
    public function store(RoleStoreRequest $request, RoleService $service)
    {
        $role = $service->store($request);
        return redirect()->route('system.main.roles.show', compact('role'));
    }
    public function show(Role $role)
    {
        return view('modules_system_main::roles.show', compact('role'));
    }
    public function edit(Role $role)
    {
        return view('modules_system_main::roles.edit', compact('role'));
    }
    public function update(RoleUpdateRequest $request, RoleService $service, Role $role)
    {
        $service->update($request, $role);
        return redirect()->route('system.main.roles.show', compact('role'));
    }
    public function delete(Role $role)
    {
        return view('modules_system_main::roles.delete', compact('role'));
    }
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('system.main.roles.index');
    }
    public function permissions_edit(Role $role)
    {
        $groups = PermissionGroup::all();
        return view('modules_system_main::roles.permissions', compact('role', 'groups'));
    }
    public function permissions_update(Request $request, Role $role)
    {
        $role->permissions()->sync($request->get('permissions'));
        return redirect()->route('system.main.roles.show', compact('role'));
    }
} 