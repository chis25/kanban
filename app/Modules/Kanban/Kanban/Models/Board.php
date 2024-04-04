<?php
namespace App\Modules\Kanban\Kanban\Models;

use App\Modules\System\Main\Models\User;
use Illuminate\Database\Eloquent\Model;
class Board extends Model
{
    protected $table = 'module_kanban_kanban_boards';
    protected $fillable =[
        'title',
    ];
    public function columns () {
        return $this->hasMany(Column::class);
    }
    public function users () {
        return $this->belongsToMany(User::class, 'module_kanban_kanban_users_boards')->withPivot('is_owner');
    }
    public function owner () {
        return $this->users()->wherePivot('is_owner', '=', true)->first();
    }
}