<?php

namespace App\Models;

use App\Core\Model;

class Account extends Model
{
    public function auth($login, $password)
    {
        if($login == 'admin' && md5($login.'.'.$password) == "4b78e581bdaffa037a6b11d58bdc934a")
        {
            return true;
        }

        return false;
    }

    public function isAdmin($session)
    {
        return $session;
    }
}