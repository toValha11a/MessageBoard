<?php

namespace Poc\Classes\Helper;

class ORM
{
	protected $mysqli;
	private $hostname = 'localhost';
	private $username = 'root';
	private $password = '';
	private $database = 'practicebase';

	private $table;

	private $fields;

	private $values;

	private $sql;

	/**
	 *
	 */
	public function __construct()
	{
		$this->mysqli = new \mysqli(
			$this->hostname,
			$this->username,
			$this->password,
			$this->database,
		);
	}

	/**
	 * @param string $table
	 */
	public function setTable(string $table)
	{
		$this->table = $table;
		return $this;
	}

	/**
	 * @param array $fields
	 */
	public function setFields(array $fields)
	{
		$fieldsString = implode(', ', $fields);
		$this->fields = $fieldsString;
		return $this;
	}

	/**
	 * @param array $values
	 */
	public function setValues(array $values)
	{
		$valueString = '';
		foreach ($values as $value) {
			$valueString .= "'$value', ";
		}
		$valueString = substr($valueString,  0, -2);
		$this->values = $valueString;
		return $this;
	}
	/**
	 */
	public function addQuery()
	{
		$this->sql = "INSERT INTO $this->table ($this->fields) VALUES ($this->values)";
		return $this;
	}

	/**
	 * @return bool
	 */
	public function exec(): bool
	{
		$result = $this->mysqli->query($this->sql);
		return $result ? true : false;
	}

	public function getExec(): array
	{
		$this->sql = "SELECT LOGIN,PASSWORD FROM users WHERE LOGIN = :LOGIN ";
		if ($result = $this->mysqli->query($this->sql))
		{
			while ($row = $result->fetch_array(MYSQLI_ASSOC))
			{
				$userLogin = $row['LOGIN'];
				$userPassword = $row['PASSWORD'];
			}
		}
		$userData = ['userlogin'=> $userLogin, 'userpassword'=> $userPassword];
		return $userData;
	}

}