<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Group::create([
            'slug' => 'administrator',
            'type' => 'role',
            'name' => 'Administrator',
            'description' => 'Administrator Role',
            'permissions' => [
                'administrator' => 1
            ]
        ]);
    }
}
