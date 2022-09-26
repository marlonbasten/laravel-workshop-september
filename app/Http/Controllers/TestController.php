<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $name = '<script>alert("Gehackt!");</script>';
        $age = 25;
        $users = [];

        return view('welcome', [
            'name' => $name,
            'age' => $age,
            'users' => $users,
        ]);
    }
}
