<?php
namespace App\Modules\Kanban\Kanban\Models;
use Illuminate\Database\Eloquent\Model;
class Card extends Model
{
    protected $table = 'module_kanban_kanban_cards';
    protected $fillable =[
        'title',
        'column_id',
    ];
    public function board () {
        return $this->hasOneThrough(Column::class, Board::class);
    }
    public function column () {
        return $this->belongsTo(Column::class);
    }
}