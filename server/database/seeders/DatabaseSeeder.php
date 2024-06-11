<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Role::create(['name' => 'admin'])->save();
        Role::create(['name' => 'user'])->save();

        // DB::connection("mongodb")->collection("chat_rooms")->insert([
        //     'name' => 'General chat',
        //     'type' => 'public',
        //     'performanceDate' => Carbon::create(2024, 6, 30, 20, 0, 0, 'CDT'),
        // ]);

        // DB::connection("mongodb")->collection("chat_rooms")->insert([
        //     'name' => 'Hello world!',
        //     'type' => 'public',
        //     'performanceDate' => Carbon::create(2024, 6, 30, 20, 0, 0, 'CDT'),
        // ]);

    }
}