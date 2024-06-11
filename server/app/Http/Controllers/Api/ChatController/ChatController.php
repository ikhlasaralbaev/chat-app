<?php

namespace App\Http\Controllers\Api\ChatController;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChatRoomStoreRequest;
use App\Http\Services\Chat\ChatService;
use App\Models\ChatRoom;
use Exception;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class ChatController extends Controller
{

    private $chatService;

    public function __construct(ChatService $_chatService) {
        $this->chatService = $_chatService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->chatService->getAllChats();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ChatRoomStoreRequest $request)
    {
        $data = $request->validated();
        $msg = '';
        try {
            ChatRoom::create($data);
            $msg = "Success";
        } catch (Exception $e) {
            $msg = "Create user via Eloquent MongoDB model Error:  " . $e->getMessage();
        }

        return ["message" => $msg];
    }


    /**
     * Sending message,
     */
    public function message() {
        return $this->chatService->message(1);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
}