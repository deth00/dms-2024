<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cookie;

class CheckRoute extends Controller
{
    public function checkUerId()
    {
        $user_id = Cookie::get('user_id');
        if (empty($user_id)) {
            return redirect()->route('login');
        }
    }
}
