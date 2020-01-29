<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@karacms.com',
            'password' => bcrypt('123456')
        ]);
        
        // Add Administrator Role for $admin
        $admin->groups()->attach([1]);
    }
}
