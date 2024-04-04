<?php
namespace App\Modules\System\Main\Controllers;
use App\Http\Controllers\Controller;
use App\Modules\System\Main\Models\Role;
use App\Modules\System\Main\Models\User;
use App\Modules\System\Main\Requests\UserPasswordRequest;
use App\Modules\System\Main\Requests\UserStoreRequest;
use App\Modules\System\Main\Requests\UserUpdateRequest;
use App\Modules\System\Main\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('modules_system_main::users.index', compact('users'));
    }
    public function create()
    {
        return view('modules_system_main::users.create');
    }
    public function store(UserStoreRequest $request, UserService $service)
    {
        $user = $service->store($request);
        return redirect()->route('system.main.users.show', compact('user'));
    }
    public function show(User $user)
    {
        return view('modules_system_main::users.show', compact('user'));
    }
    public function edit(User $user)
    {
        return view('modules_system_main::users.edit', compact('user'));
    }
    public function update(UserUpdateRequest $request, UserService $service, User $user)
    {
        $service->update($request, $user);
        return redirect()->route('system.main.users.show', compact('user'));
    }
    public function delete(User $user)
    {
        return view('modules_system_main::users.delete', compact('user'));
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('system.main.users.index');
    }
    public function roles_edit(User $user)
    {
        $roles = Role::all();
        return view('modules_system_main::users.roles', compact('user', 'roles'));
    }
    public function roles_update(Request $request, User $user)
    {
        $user->roles()->sync($request->get('roles'));
        return redirect()->route('system.main.users.show', compact('user'));
    }
    public function password_edit(User $user)
    {
        return view('modules_system_main::users.edit-password', compact('user'));
    }
    public function password_update(UserPasswordRequest $request, UserService $service, User $user)
    {
        $service->password($request, $user);
        return redirect()->route('system.main.users.show', compact('user'));
    }
} 