<?php
namespace App\Modules\Kanban\Kanban\Requests;
use Illuminate\Foundation\Http\FormRequest;
class CardStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => ['required'],
        ];
    }
}