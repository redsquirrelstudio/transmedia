<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DefaultSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setting')->truncate();
        DB::table('setting')->insert([
            [
                'key' => 'student-login',
                'value' => null,
                'enabled' => true,
            ],
            [
                'key' => 'show-stream',
                'value' => null,
                'enabled' => false,
            ],
            [
                'key' => 'show-live',
                'value' => null,
                'enabled' => false,
            ]
        ]);
    }
}
