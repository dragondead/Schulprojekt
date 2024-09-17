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
		
		
		
		$viewData = array ();
		$dbGroup = ServerInfo::getDbGroup();
		
		
		// get data from t_personal
		$db1      = \Config\Database::connect($dbGroup);
		
		
		/*
		$query = $db1->query("SELECT * FROM dbo.w_user");
		echo "<pre>"; print_r($query->getResult()); die;
		*/
		
		
		
		$builder1 = $db1->table('t_user');
		$builder1->where('u_id', 1);
		$query1   = $builder1->get();
		$user = $query1->getFirstRow('array');
		
// 		print_r($user);
		
		
		//print(phpinfo());
		
		
		
		
		
		
		
    }
}
