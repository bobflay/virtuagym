<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/../app/models/Plan.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../app/services/Email.php');

class PlanController
{

	protected $plan;


	public function __construct()
	{
		$this->plan = new Plan();
	}

	public function index()
	{
		$plans = $this->plan->all();
		if(api())
		{
			return json($plans);
		}
		require_once($_SERVER['DOCUMENT_ROOT'].'/../app/views/plans/index.php');
	}


	public function create()
	{
		require_once($_SERVER['DOCUMENT_ROOT'].'/../app/views/plans/create.php');

	}

	public function store()
	{
		$params = [
			'name'=>$_POST['name'],
		];

		$plan = $this->plan->create($params);
		return json(['message'=>'store successfully']);
	}

	public function show($id)
	{
		$plan = $this->plan->show($id);
		require_once($_SERVER['DOCUMENT_ROOT'].'/../app/views/plans/show.php');
	}


	public function attachDay()
	{

		$plan_id = $_POST['plan_id'];
		$day_id = $_POST['day_id'];
		$result = $this->plan->show($plan_id)->days()->attach(compact('plan_id','day_id'));
		$this->sendEmails($plan_id);
		return json(['message'=>'day attached successfully']);
	}


	public function sendEmails($plan_id)
	{
		$users = $this->plan->users()->toArray();
		foreach ($users as $user) {
			Email::send($user['email'],'Update from Virtuagym','A new Day was attached to your workout plan');
		}
	}



}