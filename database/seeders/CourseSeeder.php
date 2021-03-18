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
                'plural' => 'designers',
                'slug' => 'designers',
            ],
            [
                'name' => 'developer',
                'plural' => 'developers',
                'slug' => 'developers',
            ],
            [
                'name' => '3D artist',
                'plural' => '3D artists',
                'slug' => '3d-artists'
            ],
            [
                'name' => 'computer aided design',
                'plural' => 'computer aided designs',
                'slug' => 'cad'
            ],
        ]);
    }
}
