<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware(['CheckAge', 'auth']);
    }

    public function adult()
    {
        return 'You are Adult, You are allowed to see This Page';
    }
}
