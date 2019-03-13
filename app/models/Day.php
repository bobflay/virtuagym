<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/../app/models/Database.php');


class Day extends Database 
{

	protected $table = 'days';


	public function __construct()
	{
		parent::__construct();
	}


	public function exercises()
	{
		$this->pivot = 'day_exercise';
		$this->belongsToMany([
			'id'=>$this->getId(),
			'id_column'=>'day_id',
			'id_link'=>'exercise_id',
			'table1'=>'days',
			'table2'=>'exercises'
		]);

		return $this;
	}

}