<?php
namespace App\Modules\System\Main\Services;
use Illuminate\Http\Request;
use App\Modules\System\Main\Models\User;
class UserService
{
    public function store(Request $request): User
    {
        return User::create($request->validated());
    }
    public function update(Request $request, User $user): bool
    {
        return $user->update($request->validated());
    }
    public function password(Request $request, User $user): bool
    {
        return $user->update($request->validated());
    }
}