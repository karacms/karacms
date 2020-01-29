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

        App\Group::create([
            'slug' => 'editor',
            'type' => 'role',
            'name' => 'Editor',
            'description' => 'Editor Role',
            'permissions' => []
        ]);

        App\Group::create([
            'slug' => 'subscriber',
            'type' => 'role',
            'name' => 'Subscriber',
            'description' => 'Subscriber Role',
            'permissions' => []
        ]);
    }
}
