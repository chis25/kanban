<?php
namespace App\Modules\Kanban\Kanban\Models;
use Illuminate\Database\Eloquent\Model;
class Column extends Model
{
    protected $table = 'module_kanban_kanban_columns';
    protected $fillable =[
        'title',
        'board_id',
    ];
    public function board () {
        return $this->belongsTo(Board::class);
    }
    public function cards () {
        return $this->hasMany(Card::class);
    }
}