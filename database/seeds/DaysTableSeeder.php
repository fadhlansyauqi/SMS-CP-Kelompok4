<?php

use Illuminate\Database\Seeder;

class DaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $days = [
            ['hari' => 'Senin'],
            ['hari' => 'Selasa'],
            ['hari' => 'Rabu'],
            ['hari' => 'Kamis'],
            ['hari' => 'Jumat'],
            ['hari' => 'Sabtu'],
            // Tambahkan data hari lainnya sesuai kebutuhan
        ];

        DB::table('tbl_days')->insert($days);
    }
}
