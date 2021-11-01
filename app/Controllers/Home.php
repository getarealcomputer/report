<?php 

namespace App\Controllers;

class Home extends \IonAuth\Controllers\Auth
{
  public function index()
  {
    $data['title'] = 'eReport | FlashSoft';
    return view('index', $data);
  }
}
