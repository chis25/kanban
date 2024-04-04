<?php
namespace App\Modules\Kanban\Kanban\Models;
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
}