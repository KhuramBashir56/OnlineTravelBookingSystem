<?php

namespace App\Gates;

class UserGate
{
    public function verify_user_role($user)
    {
        return $user->account_type === 'user';
    }
}
