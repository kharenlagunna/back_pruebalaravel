<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['email'=>'karen@gmail.com',
                    'password'=> bcrypt('P@ss0102'),
                    'name'=>'Karen',
                    'last_name'=>'Laguna',
                    'phone'=>'122334',
                    'identification_number'=>'12315415',
                    'birth_date'=>'1995-04-29',
                    'idroles'=>1,
                    'idcities'=>1
                    ]);

                    User::create(['email'=>'user@gmail.com',
                    'password'=> bcrypt('@password1'),
                    'name'=>'Liseth',
                    'last_name'=>'Laguna',
                    'phone'=>'122334',
                    'identification_number'=>'1231111115415',
                    'birth_date'=>'1995-04-29',
                    'idroles'=>2,
                    'idcities'=>1
                    ]);

                    User::create(['email'=>'user1@gmail.com',
                    'password'=> bcrypt('@password2'),
                    'name'=>'Liseth',
                    'last_name'=>'Laguna',
                    'phone'=>'122334',
                    'identification_number'=>'111111',
                    'birth_date'=>'1995-04-29',
                    'idroles'=>2,
                    'idcities'=>1
                    ]);

                    User::create(['email'=>'user2@gmail.com',
                    'password'=> bcrypt('@password3'),
                    'name'=>'Liseth',
                    'last_name'=>'Laguna',
                    'phone'=>'122334',
                    'identification_number'=>'11111111',
                    'birth_date'=>'1995-04-29',
                    'idroles'=>2,
                    'idcities'=>1]);
    }
}
