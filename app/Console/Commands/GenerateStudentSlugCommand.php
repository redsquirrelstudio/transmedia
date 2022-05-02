<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class GenerateStudentSlugCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'student:slugs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate slugs for students';

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
        $users = User::all();
        foreach($users as $key => $user){
            $parts = [];
            $name = str_replace(' ', '', $user->name);
            $split = explode(' ',  $name);
            if (isset($split[0])){
                $parts[] = $split[0];
            }
            if(isset($split[1])){
                $parts[] = $split[1];
            }
            $user->slug = utf8_encode(strtolower(implode('', $parts)));
            $user->save();
            $this->info(($key + 1).'/'.count($users));
        }
        return 0;
    }
}
