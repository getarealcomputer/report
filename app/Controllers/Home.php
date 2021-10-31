<?php 

namespace App\Controllers;

class Home extends \IonAuth\Controllers\Auth
{
  public function index()
  {
    return view('index');
  }
}
