<?php
namespace App\Modules\Kanban\Kanban\Requests;
use Illuminate\Foundation\Http\FormRequest;
class BoardUpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => ['required'],
        ];
    }
}