<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    public function up()
    {
        $user = \App\Modules\System\Main\Models\User::create([
            'name' => 'Administrator',
            'email' => 'admin@localhost',
            'password' => Hash::make('z1x2c3v4b5'),
        ]);
        $role = \App\Modules\System\Main\Models\Role::create([
            'name' => 'admin',
            'title' => 'Администратор',
            'is_system' => true,
        ]);
        $user->roles()->sync([$role->id]);
    }
    public function down()
    {
    }
};
