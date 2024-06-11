<?php

namespace Database\Seeders;

use App\Models\ChatRoom;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChatRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::connection("mongodb")->collection("chat_rooms")->insert([
            'name' => 'General chat',
            'type' => 'public',
            'performanceDate' => Carbon::create(2024, 6, 30, 20, 0, 0, 'CDT'),
        ]);

        DB::connection("mongodb")->collection("chat_rooms")->insert([
            'name' => 'Hello world!',
            'type' => 'public',
            'performanceDate' => Carbon::create(2024, 6, 30, 20, 0, 0, 'CDT'),
        ]);

    }
}