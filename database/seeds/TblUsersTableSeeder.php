<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TblUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin
        DB::table('tbl_users')->insert([
            'name'     => 'Admin',
            'role'     => 'ADMIN',
            'email'    => 'admin@mail.com',
            'password' => Hash::make('password'),
        ]);

        // Teacher
        DB::table('tbl_users')->insert([
            'name'     => 'Teacher',
            'role'     => 'TEACHER',
            'email'    => 'teacher@mail.com',
            'password' => Hash::make('password'),
        ]);

        // Student
        DB::table('tbl_users')->insert([
            'name'     => 'Student',
            'role'     => 'STUDENT',
            'email'    => 'student@mail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
