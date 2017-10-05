<?php

use Illuminate\Database\Seeder;

class SectorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sectors = [
            [
                'id' => 1,
                'name' => 'Agriculture',
            ],
            [
                'id' => 2,
                'name' => 'Education',
            ],
            [
                'id' => 3,
                'name' => 'Entertainment',
            ],
            [
                'id' => 4,
                'name' => 'Finance',
            ],
        ];

        DB::table('sectors')->insert($sectors);
    }
}
