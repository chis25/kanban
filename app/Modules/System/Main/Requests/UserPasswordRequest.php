<?php

namespace App\Modules\System\Main\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPasswordRequest extends FormRequest
{
    public function rules()
    {
        return [
            'password' => ['required'],
        ];
    }
}
