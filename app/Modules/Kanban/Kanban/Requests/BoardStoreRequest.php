<?php
namespace App\Modules\Kanban\Kanban\Requests;
use Illuminate\Foundation\Http\FormRequest;
class BoardStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => ['required'],
        ];
    }
}