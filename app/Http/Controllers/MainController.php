<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function index($user)
    {
        $user = User::findOrFail($user);
        return view('main',
            [
                'user' => $user
            ]
        );
    }
}
