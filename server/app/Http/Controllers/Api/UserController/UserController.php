<?php

namespace App\Http\Controllers\Api\UserController;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\Api\UserResource;
use App\Http\Services\User\UserService as UserUserService;
use App\Models\User;
use Illuminate\Http\Request;
use UserService;

class UserController extends Controller
{
    private $userService;
    public function __construct(private readonly UserUserService $_userService) {
        $this->userService = $_userService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $users = $this->userService->findAll();
        return UserResource::collection($users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();

        $newUser = $this->userService->create($data->email, $data->name, $data->password);

        return UserResource::make($newUser);
    }


    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);

        // Delete the user
        $user->delete();

        // Return a response
        return response()->json(['message' => 'User deleted successfully.'], 200);
    }
}