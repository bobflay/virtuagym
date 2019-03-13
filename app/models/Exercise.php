<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/../app/models/Database.php');


class Exercise extends Database 
{

	protected $table = 'exercises';


	public function __construct()
	{
		parent::__construct();
	}


	public function days()
	{
		$this->pivot = 'day_exercise';
		$this->belongsToMany([
			'id'=>$this->getId(),
			'id_column'=>'exercise_id',
			'id_link'=>'day_id',
			'table1'=>'exercises',
			'table2'=>'days'
		]);

		return $this;

	}


}