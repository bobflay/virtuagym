<?php

class Database {


	protected $connection;
	protected $pivot;
	protected $result;
	protected $id;


	public function __construct()
	{
		require_once($_SERVER['DOCUMENT_ROOT'].'/../config/database.php');

		$this->connection = new PDO($dsn, $username, $password, $options);

	}


	public function create($params)
	{
		$sql = sprintf(
				"INSERT INTO %s (%s) values (%s)",
				$this->table,
				implode(", ", array_keys($params)),
				":" . implode(", :", array_keys($params))
		);

		$statement = $this->connection->prepare($sql);
		$statement->execute($params);
	}


	public function all()
	{
		$sql = "select * from ". $this->table;
		$statement = $this->connection->prepare($sql);
		$statement->execute();
		$data = $statement->fetchAll();
		$result = $this->format($data);
		return $result;
	}

	public function show($id)
	{
		$sql = "select * from ". $this->table ." where id = $id";
		$statement = $this->connection->prepare($sql);
		$statement->execute();
		$result = $statement->fetchAll();
		$this->result = $result[0];
		$this->id = $this->result['id'];
		return $this;
	}


	public function belongsToMany($params)
	{
		$id = $params['id'];
		$id_column = $params['id_column'];
		$id_link = $params['id_link'];
		$table1 = $params['table1'];
		$table2 = $params['table2'];

		$sql = 'select * from '.$table2.' inner join '.$this->pivot.' on '.$table2.'.id = '.$this->pivot.'.'.$id_link.' where '. $this->pivot.'.'.$id_column . '="'.$id.'"';

		$statement = $this->connection->prepare($sql);
		$statement->execute();
		$this->result = $statement->fetchAll();
		return $this;
	}


	public function attach($params)
	{
		$keys = array_keys($params);
		$keys = implode(',', $keys);
		$values =array_values($params);
		$values = implode(',', $values);

		$sql = 'insert into '. $this->pivot . ' ('.$keys.') values ('.$values.')';
		$statement = $this->connection->prepare($sql);
		$statement->execute($params);
		return $this;

	}





	public function format($data)
	{

		$result = [];
		foreach ($data as $key => $value) {
			$obj=[];
			foreach ($value as $k => $va) {
				if(!is_numeric($k))
				{
					$obj[$k]=$va;
				}
			}
			array_push($result, $obj);
		}

		return $result;
	}



	public function toArray()
	{
		return $this->result;
	}

	public function getId()
	{
		return $this->id;
	}


}
