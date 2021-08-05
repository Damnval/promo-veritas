<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return voida
     */
    public function run()
    {
        // creates 2 dummy clients/users
        User::factory(2)->create([
            'password' => Hash::make('password'),
        ]);
    }
}