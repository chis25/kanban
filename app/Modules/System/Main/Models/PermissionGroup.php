<?php

namespace App\Modules\System\Main\Models;

use Illuminate\Database\Eloquent\Model;

class PermissionGroup extends Model
{
    public $timestamps = false;
    protected $table = 'module_system_main_permissions_groups';
    protected $fillable = [
        'title',
    ];
    public function permissions()
    {
        return $this->hasMany(Permission::class, 'group_id');
    }
}
