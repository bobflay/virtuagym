<?php

	$GLOBALS['api_request'] = true;

	if($_SERVER['REQUEST_METHOD']=='GET')
	{
		switch ($request) {

			case '/users':
				$redirect = new UserController();
				$redirect->index();
				break;
			case '/plans':
				$redirect = new PlanController();
				$redirect->index();
				break;
			case '/exercises':
				$redirect = new ExerciseController();
				$redirect->index();
				break;
			case '/days':
				$redirect = new DayController();
				$redirect->index();
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

				
				break;
		}
	}elseif($_SERVER['REQUEST_METHOD']=='POST')
	{
		switch ($request) {
			case '/users':
				$redirect = new UserController();
				$redirect->store();
				break;
			case '/plans/days':
				$redirect = new PlanController();
				$redirect->attachDay();
				break;
			case '/exercises':
				$redirect = new ExerciseController();
				$redirect->store();
				break;
			case '/days':
				$redirect = new DayController();
				$redirect->store();
				break;
			case '/days/exercises':
				$redirect = new DayController();
				$redirect->attachExercise();
				break;
			case '/users/plans':
				$redirect = new UserController();
				$redirect->attachPlan();
				break;
		}
	}