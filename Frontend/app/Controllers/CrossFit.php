<?php

namespace App\Controllers;

class CrossFit extends BaseController
{
    public function index()
    {
		echo view('templates/header');
		echo view('templates/navigation');
        echo view('crossfit_view');
		echo view('templates/footer');
    }
}
