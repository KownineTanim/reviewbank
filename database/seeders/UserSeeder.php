<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!\App\Models\User::exists()) {
            \App\Models\User::insert([
                [
                    'first_name' => 'Review Bank',
                    'mobile_primary' => '01926145980',
                    'email' => 'admin@email.com',
                    'password' => bcrypt('password'),
                    'active_role_id' => 1,
                ],
                [
                   'first_name' => 'Mojahed',
                   'email' => 'work.mojahedul@gmail.com',
                   'mobile_primary' => '01861583588',
                   'password' => bcrypt('password'),
                   'active_role_id' => 1
               ],
            ]);

            \App\Models\UserHasRole::insert([
                [
                    'user_id' => 1,
                    'role_id' => 1
                ],
                [
                    'user_id' => 1,
                    'role_id' => 2
                ],
                [
                    'user_id' => 2,
                    'role_id' => 1
                ],
                [
                    'user_id' => 2,
                    'role_id' => 2
                ]
            ]);
        }
    }
}
