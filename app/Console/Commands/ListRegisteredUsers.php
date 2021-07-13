<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class ListRegisteredUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'list:registered';

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
     * @return mixed
     */
    public function handle()
    {
        $this->info('ٌRegistered Users:');
        $users = User::all();
        foreach ($users as $user) {
            $this->line("$user->name ($user->email)");
        }
        
    }
}
