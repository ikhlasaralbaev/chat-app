<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class ChatRoom extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'chat_rooms';


    protected $fillable = [
        'name',
        'type',
        'info'
        // Add other fields as needed
    ];

    protected $casts = ['performanceDate' => 'datetime'];

    public function messages() {
        return $this->referencesMany(ChatMessages::class);
    }

    public function users() {
        return $this->referencesMany(User::class);
    }

    // Optionally, define any relationships or additional methods here
}