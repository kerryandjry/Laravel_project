<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function add()
    {
        return view('user.add');
    }

    public function store(Request $request){
        $input = $request->all();
        dd($input);
    }
}
