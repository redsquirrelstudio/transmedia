<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MakeAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::table('admin_users')->insert([
            [
                'email' => 'lewisraggett17@gmail.com',
                'password' => Hash::make($this->argument('password')),
                'first_name' => 'Lewis',
                'last_name' => 'Raggett',
                'activated' => true,
                'forbidden' => false,
                'language' => 'en',

            ]
        ]);
        $this->info('user created');
        return 0;
    }
}
