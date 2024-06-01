<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!\App\Models\Role::exists()) {
            \App\Models\Role::insert([
                [ 'name' => 'Admin' ],
                [ 'name' => 'User' ]
            ]);
        }
    }
}
