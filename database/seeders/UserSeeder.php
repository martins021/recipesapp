<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->times(40)->create();
        User::create([
            'name' => 'Administrator',
            'email' => 'administrator@user.com',
            'password' => 'administrator',
            'isAdmin' => '1',
            'isModerator' => '1',
        ]);
    }
}
