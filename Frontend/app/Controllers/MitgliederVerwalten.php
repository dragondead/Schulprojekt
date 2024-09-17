<?php

namespace App\Controllers;

class MitgliederVerwalten extends BaseController
{
    public function index()
    {
		echo view('templates/header');
		echo view('templates/navigation');
        echo view('mitglieder_view');
		echo view('templates/footer');
    }
}
