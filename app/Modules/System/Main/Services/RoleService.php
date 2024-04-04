<?php
namespace App\Modules\System\Main\Services;
use Illuminate\Http\Request;
use App\Modules\System\Main\Models\Role;
class RoleService
{
    public function store(Request $request): Role
    {
        return Role::create($request->validated());
    }
    public function update(Request $request, Role $role): bool
    {
        return $role->update($request->validated());
    }
}