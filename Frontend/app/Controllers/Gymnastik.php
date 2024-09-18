<?php

namespace App\Controllers;

class Gymnastik extends BaseController
{
    public function index()
    {
		echo view('templates/header');
		echo view('templates/navigation');
        echo view('gymnastik_view');
		echo view('templates/footer');
    }
}
