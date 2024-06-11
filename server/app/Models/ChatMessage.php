<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class ChatMessages extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'chat_messages';


    protected $fillable = [
        'message',
        'chat_room_id',
        // Add other fields as needed
    ];

    protected $casts = ['performanceDate' => 'datetime'];

    public function room() {
        return $this->referencesMany(ChatRoom::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    // Optionally, define any relationships or additional methods here
}