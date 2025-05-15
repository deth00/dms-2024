<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cookie;

abstract class Controller
{
    public function checkUerId()
    {
        $user_id = Cookie::get('user_id');
        if (empty($user_id)) {
            return redirect()->route('login');
        }
    }
}
