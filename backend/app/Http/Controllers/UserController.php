<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        dd('test!!!!');
    }

    public function slash()
    {
        dd('slash');
    }


    public function show($new)
    {
        dd($new);
    }

    public function create()
    {
        dd('create');
    }

    public function createNew()
    {
        dd('createNew');
    }

    public function update()
    {
        dd('update!');
    }


    public function delete()
    {
        dd('delete!');
    }
}