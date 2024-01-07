<?php

namespace App\Gates;

class AgencyGate
{
    public function verify_agency_role($user)
    {
        return $user->account_type === 'agency';
    }
}
