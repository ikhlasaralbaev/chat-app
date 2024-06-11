<?php

declare(strict_types=1);

namespace App\Http\Services\Chat;

use App\Events\Message;
use App\Http\Resources\Api\ChatRoomResource;
use App\Models\ChatRoom;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class ChatService implements ChatServiceInterface {

    public function getChatWithId($id)
    {
        return ChatRoomResource::collection(ChatRoom::all());
    }

    public function getAllChats()
    {
        return ChatRoomResource::collection(DB::connection("mongodb")->collection("chat_rooms")->get());
    }

    public function createChatRoom($userId) {
        DB::connection("mongodb")->collection("chat_rooms")->insert([
            'name' => 'General chat',
            'type' => 'public',
            'users' => [$userId, $userId],
            'performanceDate' => now(),
        ]);
    }

    public function message($chat_room_id) {
       try {
        $response = event(new Message('ikhlasaralbaev', "Hello world!"));
        return ["message"=> $response];
       } catch (Exception $e) {
        throw new BadRequestException("Error");
       }
    }

}