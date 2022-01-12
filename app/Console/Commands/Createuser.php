<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Console\Command;

class Createuser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new user command';

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
        $name = Str::random($length=8);
        $password = Str::random($length=12);
        User::create([
            'name'=>$name,
            'email'=>$name.'@gmail.com',
            'password'=>$password,

        ]);
        //$this->info(string:'Success');
        //return 0;
        $this->info('The command was successful!');
    }
}
