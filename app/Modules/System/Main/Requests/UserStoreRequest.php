<?php
namespace App\Modules\System\Main\Requests;
use Illuminate\Foundation\Http\FormRequest;
class UserStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
        ];
    }
}