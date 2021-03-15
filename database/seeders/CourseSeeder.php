<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('course')->insert([
            [
                'name' => 'designer',
                'plural' => 'designers'
            ],
            [
                'name' => 'developer',
                'plural' => 'developers'
            ],
            [
                'name' => '3D artist',
                'plural' => '3D artists'
            ],
            [
                'name' => 'computer aided design',
                'plural' => 'computer aided designs'
            ],
        ]);
    }
}
