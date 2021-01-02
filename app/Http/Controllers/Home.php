<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class Home extends Controller
{
    public function index(): \Illuminate\View\View
    {
        $data = [
            'title' => 'home',
            'page'  => 'home',
            'content' => '',
        ];

        return view('home.index')->with($data);
    }
}
