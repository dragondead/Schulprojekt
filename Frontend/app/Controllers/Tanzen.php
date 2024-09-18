<?php

namespace App\Controllers;

class Tanzen extends BaseController
{
    public function index()
    {
		echo view('templates/header');
		echo view('templates/navigation');
        echo view('tanzen_view');
		echo view('templates/footer');
    }
}
