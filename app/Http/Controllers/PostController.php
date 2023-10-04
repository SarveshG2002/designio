<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function addNewPost(Request $request)
    {
        echo "<pre>";
        print_r($request->all());

    }
}
