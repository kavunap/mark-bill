<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id'=>1,
            'name' => 'Admin User',
            'user_role' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'id'=>2,
            'name' => 'Teacher user 1',
            'user_role' => 'teacher',
            'email' => 'teacher@gmail.com',
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'id'=>3,
            'name' => 'Teacher user 2',
            'user_role' => 'teacher',
            'email' => 'teacher2@gmail.com',
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'id'=>4,
            'name' => 'Super Admin User',
            'user_role' => 'super_admin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
