<?php
namespace App\Modules\System\Main\Requests;
use Illuminate\Foundation\Http\FormRequest;
class RoleStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required'],
            'title' => ['required'],
        ];
    }
}