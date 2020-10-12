<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class NewAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Admin Account ';

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
        $name = $this->ask('Account Name');
        $email = $this->ask('Account Email');
        $password = $this->ask('Account Password');
        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);
        echo "Account created successfully \n";
        return 0;
    }
}
