<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;

class UserController extends Controller
{
    public function store()
    {
        $html = '<div>Hey, happay day</div>';
        // sync
        SendEmail::dispatch(env('MAIL_TO_ADDRESS', ''), $html);
        SendEmail::dispatch(env('MAIL_TO_ADDRESS', ''), $html)->onConnection('database');

        return response()->json(['message' => 'updated']);
    }
}
