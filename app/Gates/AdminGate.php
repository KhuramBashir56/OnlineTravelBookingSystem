<?php

namespace App\Gates;

class AdminGate
{
    public function verify_admin_role($user)
    {
        return $user->account_type === 'admin';
    }
}
