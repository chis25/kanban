<?php

namespace App\Modules\System\Main\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false;
    protected $table = 'module_system_main_roles';
    protected $fillable = [
        'name',
        'title',
        'is_system',
    ];
    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'module_system_main_roles_permissions');
    }
    public function users()
    {
        return $this->belongsToMany(User::class,'module_system_main_users_roles');
    }
}
