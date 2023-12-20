<?php

use Illuminate\Database\Seeder;

class LessonHoursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lessonHours = [
            ['jam' => '1', 'waktu' => '07.30 - 08.15'],
            ['jam' => '2', 'waktu' => '08.15 - 09.00'],
            ['jam' => '3', 'waktu' => '09.00 - 09.45'],
            ['jam' => '4', 'waktu' => '10.00 - 10.45'],
            ['jam' => '5', 'waktu' => '10.45 - 11.30'],
            ['jam' => '6', 'waktu' => '11.45 - 12.30'],
            ['jam' => '7', 'waktu' => '12.30 - 13.15'],
            // Tambahkan data jam pelajaran lainnya sesuai kebutuhan
        ];

        DB::table('tbl_lesson_hours')->insert($lessonHours);
    }
}
