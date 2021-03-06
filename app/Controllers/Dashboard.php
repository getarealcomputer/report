<?php 

namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends Controller
{
  public function index()
  {
    $dynamicElement = [
      'title' => 'Dashboard | eReport',
      'breadcrumb_title' => 'Dashboard',
      'breadcrumb' => [
        [
          'title' => 'Home',
          'link' => '/'
        ],
        [
          'title' => 'Dashboard',
          'link' => ''
        ]
      ]
    ];

    return view('dashboard/index', $dynamicElement);
  }
}
