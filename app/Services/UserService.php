<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    /**
     * Performs the logic when finding for user using slug
     *
     * @param String $clientSlug
     * @return Obeject $user. Object of found User 
     */
    public function getUserBySlug($clientSlug)
    {
        $where = [
            'slug_full_name' => $clientSlug
        ];

        $user  = User::where($where)->firstorfail();

        return $user;
    }
}
