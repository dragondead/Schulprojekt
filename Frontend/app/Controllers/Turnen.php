<?php

namespace App\Controllers;

class Turnen extends BaseController
{
    public function index()
    {
		echo view('templates/header');
		echo view('templates/navigation');
        echo view('turnen_view');
		echo view('templates/footer');
    }
}
