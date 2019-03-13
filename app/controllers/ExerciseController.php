<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/../app/models/Exercise.php');


class ExerciseController
{

	protected $exercise;
	
	public function __construct()
	{
		$this->exercise = new Exercise();
	}

	public function index()
	{
		$exercises = $this->exercise->all();
		if(api())
		{
			return json($exercises);
		}
		require_once($_SERVER['DOCUMENT_ROOT'].'/../app/views/exercises/index.php');
	}


	public function create()
	{
		require_once($_SERVER['DOCUMENT_ROOT'].'/../app/views/exercises/create.php');

	}


	public function store()
	{
		$params = [
			'name'=>$_POST['name'],
			'calories'=>$_POST['calories'],
			'free_weight'=>$_POST['free_weight'],
		];

		if($params['free_weight']==true)
		{
			$params['free_weight']=1;
		}else{
			$params['free_weight']=0;
		}

		$exercise = $this->exercise->create($params);
		
		echo json_encode(['status'=>'200','message'=>"store successfully"]);
	}


	public function show($id)
	{
		$exercise = $this->exercise->show($id);
		require_once($_SERVER['DOCUMENT_ROOT'].'/../app/views/exercises/show.php');
	}

}