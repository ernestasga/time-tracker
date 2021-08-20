<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = '00000000';
        foreach (range(1,10) as $index) {
            User::create([
                'name' => 'User'.$index,
                'email' => 'user'.$index.'@test.com',
                'password' => bcrypt($password)
            ]);
        }

    }
}
