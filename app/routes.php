<?php


	if($_SERVER['REQUEST_METHOD']=='GET')
	{
		switch ($request) {
			case '/':
				$redirect = new HomeController();
				$redirect->index();
				break;
			case '/users/create':
				$redirect = new UserController();
				$redirect->create();
				break;
			case '/users':
				$redirect = new UserController();
				$redirect->index();
				break;
			case '/plans/create':
				$redirect = new PlanController();
				$redirect->create();
				break;
			case '/plans':
				$redirect = new PlanController();
				$redirect->index();
				break;
			case '/exercises/create':
				$redirect = new ExerciseController();
				$redirect->create();
				break;
			case '/exercises':
				$redirect = new ExerciseController();
				$redirect->index();
				break;
			case '/days':
				$redirect = new DayController();
				$redirect->index();
				break;
			case '/days/create':
				$redirect = new DayController();
				$redirect->create();
				break;
				
			default:

				$request = explode('/users/', $request);
				if(sizeof($request)>1)
				{
					$id = $request[1];
					$redirect = new UserController();
					$redirect->show($id);
				}

				$request = $request[0];
				$request = explode('/plans/', $request);
				if(sizeof($request)>1)
				{
					$id = $request[1];
					$redirect = new PlanController();
					$redirect->show($id);
				}

				$request = $request[0];
				$request = explode('/exercises/', $request);
				if(sizeof($request)>1)
				{
					$id = $request[1];
					$redirect = new ExerciseController();
					$redirect->show($id);
				}


				$request = $request[0];
				$request = explode('/days/', $request);
				if(sizeof($request)>1)
				{
					$id = $request[1];
					$redirect = new DayController();
					$redirect->show($id);
				}

				
				break;
		}
	}elseif($_SERVER['REQUEST_METHOD']=='POST')
	{
		switch ($request) {
			case '/users':
				$redirect = new UserController();
				$redirect->store();
				break;
			case '/plans':
				$redirect = new PlanController();
				$redirect->store();
				break;
			case '/exercises':
				$redirect = new ExerciseController();
				$redirect->store();
				break;
			case '/days':
				$redirect = new DayController();
				$redirect->store();
				break;
		}
	}




?>