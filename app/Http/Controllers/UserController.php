<?php

namespace App\Http\Controllers;

use App\Services\UserService;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserService $userService)
    {
        $this->user_service = $userService;
    }

    /**
     * Display the specified resource.
     *
     * @param string $clientSlug
     * @return \Illuminate\Http\Response
     */
    public function show($clientSlug)
    {  
        try {

            $user = $this->user_service->getUserBySlug($clientSlug);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {

            $message = 'Client/User doesn\'t exist.';
            return $message;
        }
       
        return response()->json($user);
    }

}
