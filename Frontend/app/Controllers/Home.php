<?php

namespace App\Controllers;

use App\Libraries\ServerInfo;

class Home extends BaseController
{
    public function index()
    {
		echo view('templates/header');
		echo view('templates/navigation');
        echo view('home_view');
		echo view('templates/footer');	
    }
}
