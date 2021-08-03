<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'name'               => 'admin',
            'email'              => 'admin@admin.com',
            'password'           => bcrypt('password'),
            'email_verified_at'  => now(),
            'remember_token'     => Str::random(10),
        ];

        User::create($user);
    }
}
