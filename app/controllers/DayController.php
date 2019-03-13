<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/../app/models/Day.php');

class DayController
{

	private $day;

	public function __construct()
	{
		$this->day = new Day();
	}

	public function index()
	{
		$days = $this->day->all();
		if(api())
		{
			return json($days);
		}
		require_once($_SERVER['DOCUMENT_ROOT'].'/../app/views/days/index.php');
	}


	public function create()
	{
		require_once($_SERVER['DOCUMENT_ROOT'].'/../app/views/days/create.php');
	}

	public function show($id)
	{
		$day = $this->day->show($id);
		require_once($_SERVER['DOCUMENT_ROOT'].'/../app/views/days/show.php');
	}


	public function store()
	{
		$params = [
			'name'=>$_POST['name']
		];

		$user = $this->day->create($params);
		return json(['message'=>'store successfully']);
	}


	public function attachExercise()
	{
		$exercise_id = $_POST['exercise_id'];
		$day_id = $_POST['day_id'];
		$result = $this->day->exercises()->attach(compact('exercise_id','day_id'));
		return json(['message'=>'day attached successfully']);
	}

}