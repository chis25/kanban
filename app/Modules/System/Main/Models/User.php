<?php

namespace App\Modules\System\Main\Models;

use App\Modules\Kanban\Kanban\Models\Board;
use App\Modules\Kanban\Kanban\Models\Card;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'module_system_main_users';
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'module_system_main_users_roles');
    }
    public function hasPermission($permission)
    {
        if ($this->hasRole('admin')) {
            return true;
        }
        foreach ($this->roles as $role) {
            if ($role->permissions->contains('name', $permission)) {
                return true;
            }
        }
        return false;
    }
    public function hasRole($role)
    {
        return (bool) $this->roles->where('name', $role)->count();
    }
    public function boards()
    {
        return $this->belongsToMany(Board::class, 'module_kanban_kanban_users_boards')->withPivot('is_owner');
    }
    public function cards()
    {
        return $this->belongsToMany(Card::class, 'module_kanban_kanban_users_cards');
    }
}
