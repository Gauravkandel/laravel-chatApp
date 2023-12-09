<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function getUser()
    {
        $user = auth()->user();
        return $user;
    }
    public function getUsers()
    {
        $users = User::where('id', '!=', auth()->user()->id)->get();
        return response()->json(["user" => $users], 200);
    }
}
