<?php

namespace App\Modules\System\Main\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public $timestamps = false;
    protected $table = 'module_system_main_permissions';
    protected $fillable = [
        'name',
        'title',
        'group_id',
    ];
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'module_system_main_roles_permissions');
    }
    public function group()
    {
        return $this->belongsTo(PermissionGroup::class, 'group_id');
    }
}
