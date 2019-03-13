<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/../app/models/User.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../app/services/Email.php');

class UserController
{

	private $user;

	public function __construct()
	{
		$this->user = new User();
	}

	public function index()
	{

		$users = $this->user->all();

		if(api())
		{
			json($user);
		}
		require_once($_SERVER['DOCUMENT_ROOT'].'/../app/views/users/index.php');
	} 


	public function create()
	{
		require_once($_SERVER['DOCUMENT_ROOT'].'/../app/views/users/create.php');
	}

	public function show($id)
	{
		$user = $this->user->show($id);
		require_once($_SERVER['DOCUMENT_ROOT'].'/../app/views/users/show.php');
	}


	public function store()
	{
		$params = [
			'first_name'=>$_POST['first_name'],
			'last_name'=>$_POST['last_name'],
			'mobile_number'=>$_POST['mobile_number'],
			'email'=>$_POST['email'],
		];

		$user = $this->user->create($params);
		json(['message'=>'store successfully']);
	}

	public function attachPlan()
	{

		$plan_id = $_POST['plan_id'];
		$user_id = $_POST['user_id'];
		$this->user->show($user_id)->plans()->attach(compact('user_id','plan_id'));
		$this->updateUserByEmail($user_id);
		return json(['message'=>'plan attached successfully']);
	}


	public function updateUserByEmail($user_id)
	{
		$user = $this->user->show($user_id)->toArray();
		Email::send($user['email'],'Update from Virtuagym','A new workout plan has been asssigned to you');
	}

}