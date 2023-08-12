<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class GenerateMasterUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:master-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = [
            [
                'name' => 'Developer Team',
                'email' => 'developer-team@gmail.com',
                'password' => bcrypt('P@$$word123'),
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'name' => 'Supervisor Team',
                'email' => 'supervisor-team@gmail.com',
                'password' => bcrypt('P@$$word123'),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        User::insertOrIgnore($users);

        $this->info('Users inserted successfully.');
    }
}
