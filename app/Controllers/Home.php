<?php 

namespace App\Controllers;

class Home extends \IonAuth\Controllers\Auth
{
  public function index()
  {
    $data['title'] = 'Front Page | FlashSoft';
    return view('index', $data);
  }
}
