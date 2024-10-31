<?php
namespace App\Controllers;

use App\Libraries\ServerInfo;
use CodeIgniter\Controller;
use MongoDB\Driver\Exception\AuthenticationException;

class Login extends Controller
{

    public function __construct()
    {
        helper([
            'url',
            'form'
        ]);

        $session = session();

        $session->set('htmlTitle', 'FPMS - Login');
    }

    public function index()
    {

        echo view('templates/header');
        echo view('login_view');
        echo view('templates/footer');
    }

}