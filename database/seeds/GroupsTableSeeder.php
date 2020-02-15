<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Str;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $timestamp = Carbon::now();

        $groups = [
            // Role Groups
            [
                'slug' => 'administrator',
                'type' => 'role',
                'name' => 'Administrator',
                'description' => 'Administrator Role',
                'permissions' => json_encode([
                    'administrator' => 1
                ]),
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'slug' => 'editor',
                'type' => 'role',
                'name' => 'Editor',
                'description' => 'Editor Role',
                'permissions' => json_encode([]),
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'slug' => 'subscriber',
                'type' => 'role',
                'name' => 'Subscriber',
                'description' => 'Subscriber Role',
                'permissions' => json_encode([]),
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            // Media Tag Groups
        ];

        $colors = ['blue', 'red', 'yellow', 'brown', 'orange', 'green', 'purple', 'teal'];

        foreach ($colors as $color) {
            $groups[] = [
                'slug' => $color,
                'type' => 'media-tag',
                'name' => Str::title($color),
                'description' => '',
                'permissions' => json_encode([]),
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            ];
        }

        App\Group::insert($groups);
        // Create Media Tag Group
    }
}
