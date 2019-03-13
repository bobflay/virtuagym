<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/../app/models/Database.php');


class User extends Database 
{

	protected $table = 'users';


	public function __construct()
	{
		parent::__construct();
	}


	public function plans()
	{
		$this->pivot = 'plan_user';
		$this->belongsToMany([
			'id'=>$this->getId(),
			'id_column'=>'user_id',
			'id_link'=>'plan_id',
			'table1'=>'users',
			'table2'=>'plans'
		]);

		return $this;
	}

}