<?php

class HomeController 
{


	public function __construct()
	{

	}


	public function index()
	{
		require_once($_SERVER['DOCUMENT_ROOT'].'/../app/views/dashboard.php');
	}



}