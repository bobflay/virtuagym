<?php

	require('../app/controllers/HomeController.php');
	require('../app/controllers/UserController.php');
	require('../app/controllers/PlanController.php');
	require('../app/controllers/ExerciseController.php');
	require('../app/controllers/DayController.php');

	$request = $_SERVER['REQUEST_URI'];

	$uri = explode('/api', $request);
	if(sizeof($uri)>1)
	{
		$request = $uri[1];
		require('../app/api.php');
	}else{
		require('../app/routes.php');
	}


	function dd($var)
	{
		die(var_dump($var));
	}

	function api()
	{
		if(isset($GLOBALS['api_request']))
		{
			return $GLOBALS['api_request'];
		}else{
			false;
		}
	}


	function json($data)
	{
		echo(json_encode(['status'=>'200','data'=>$data]));
		return;
	}








?>