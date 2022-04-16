<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "DevAdmin",
            'level' => "admin",
            'email' => "devadmin@gmail.com",
            'password' => bcrypt('devadminsih'),
        ]);

        User::create([
            'name' => "Wakil Rektor 4",
            'level' => "pimpinan",
            'email' => "rektor4uinsgd@gmail.com",
            'password' => bcrypt('rektor4uinsgdsih'),
        ]);

        User::create([
            'name' => "Fakultas Ushuluddin",
            'level' => "staff",
            'email' => "ushuluddin1@gmail.com",
            'password' => bcrypt('ushuluddin1sih'),
        ]);

        User::create([
            'name' => "Fakultas Sains dan Teknologi",
            'level' => "staff",
            'email' => "saintek7@gmail.com",
            'password' => bcrypt('saintek7sih'),
        ]);

        User::create([
            'name' => "Pyxis",
            'level' => "user",
            'email' => "hubungipyxis@gmail.com",
            'password' => bcrypt('hubungipyxissih'),
        ]);

        User::create([
            'name' => "Astrophel",
            'level' => "user",
            'email' => "astrophel@gmail.com",
            'password' => bcrypt('astrophelsih'),
        ]);
    }
}
