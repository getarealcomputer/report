<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['title']="Flashsoft | eRapor";
        return view('pages/login', $data);
    }
}
