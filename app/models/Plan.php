<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/../app/models/Database.php');


class Plan extends Database 
{

	protected $table = 'plans';

	public function __construct()
	{
		parent::__construct();
	}


	public function days()
	{
		$this->pivot = 'day_plan';
		return $this->belongsToMany([
			'id'=>$this->getId(),
			'id_column'=>'plan_id',
			'id_link'=>'day_id',
			'table1'=>'plans',
			'table2'=>'days'
		]);
		return $this;
	}

	public function users()
	{
		$this->pivot = 'plan_user';
		return $this->belongsToMany([
			'id'=>$this->getId(),
			'id_column'=>'plan_id',
			'id_link'=>'user_id',
			'table1'=>'plans',
			'table2'=>'users'
		]);
		return $this;
	}


}