<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function getSession(Request $req)
    {
        if($req->session()->has('user'))
        {
            return $req->session()->get('user');
        } else {
            return 'There is no session with this name';
        }
    }
    public function storeSession(Request $req)
    {
        $req->session()->put('user', 'Maxsimoff');
        return 'Stored Successfully';
    }
    public function deleteSession(Request $req)
    {
        $req->session()->forget('user');
        return 'Deleted Successfully';
    }
}
