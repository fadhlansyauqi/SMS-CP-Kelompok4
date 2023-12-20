<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(TblUsersTableSeeder::class);
        $this->call(DaysTableSeeder::class);
        $this->call(LessonHoursSeeder::class);
    }
}
