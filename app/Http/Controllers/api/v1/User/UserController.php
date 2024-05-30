<?php

namespace App\Http\Controllers\api\v1\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function getUser()
    {
        $data = User::all();
        return response()->json([
            'data' => $data
        ]);
    }
}
