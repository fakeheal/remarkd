<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Console\ConfirmableTrait;

class CreateUser extends Command
{
    use ConfirmableTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remarkd:create-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'CLI shortcut for adding users to the application.';

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
        if (!$this->confirmToProceed()) {
            return 0;
        }

        $email = $this->ask('Enter email address:');
        $password = $this->secret('What is the password?');
        $name = $this->ask('Name:');

        $result = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password)
        ]);

        if (!is_null($result)) {
            $this->info('User created with these credentials!');
        }
        return 0;
    }
}
