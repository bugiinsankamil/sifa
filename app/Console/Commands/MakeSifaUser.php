<?php

namespace App\Console\Commands;

use App\Models\User;
use Faker\Guesser\Name;
use Illuminate\Console\Command;

use function Laravel\Prompts\password;
use function Laravel\Prompts\text;

class MakeSifaUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:sifa-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new sifa user with prompt';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $name = text(
            label: 'Nama Lengkap?',
            placeholder: 'Nama Lengkap',
            required: true,
            validate: ['name' => 'required|string|max:255'],
        );

        $username = text(
            label: 'Username?',
            placeholder: 'username',
            required: true,
            validate: ['username' => 'required|string|max:30|unique:users,username'],
        );

        $email = text(
            label: 'Email?',
            placeholder: 'email@example.com',
            required: true,
            validate: ['email' => 'required|email|unique:users,email'],
        );

        $password = password(
            label: 'Password?',
            placeholder: 'password',
            required: true,
            validate: ['password' => 'required|string|min:8'],
        );

        $this->info('Creating user...');

        User::create([
            'name' => $name,
            'username' => $username,
            'email' => $email,
            'password' => bcrypt($password),
            'email_verified_at' => now(),
        ]);

        $this->info('User created successfully!');
    }
}
