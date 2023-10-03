<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Event;
use App\Models\Table;
use App\Models\Group;
use App\Models\Guest;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();
        Event::truncate();
        Table::truncate();
        Group::truncate();
        Guest::truncate();

        User::factory()->count(3)->create();
        Event::factory()->count(3)->create();

        dd(Event::all()->count());

        Table::factory()->count(3)->create();
        Group::factory()->count(2)->create();
        Guest::factory()->count(15)->create();
    }
}
