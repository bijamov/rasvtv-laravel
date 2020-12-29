<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class create_users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Entry = new User;
        $Entry->name = 'ADMIN_NAME';
        $Entry->email = 'admin@gmail.com';
        $Entry->password = Hash::make('123456789');
        $Entry->role = 'admin';
        $Entry->save();

        $Entry = new User;
        $Entry->name = 'USER_NAME';
        $Entry->email = 'user@gmail.com';
        $Entry->password = Hash::make('123456789');
        $Entry->role = 'user';
        $Entry->save();


    }
}
