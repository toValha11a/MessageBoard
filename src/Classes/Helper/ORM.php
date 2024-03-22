<?php

namespace Main\Classes\Helper;

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

	private $filter = '';

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
		$valueArray = [];
		foreach ($values as $value) {
			$valueArray[] = "'$value'";
		}
		$valueString = implode(", ", $valueArray);
		$this->values = $valueString;
		return $this;
	}

	public function setFilter(array $filterParams, string $logic = 'AND')
	{
		$filterArray = [];
		foreach ($filterParams as $field => $value) {
			$filterArray[] = "$field = '$value'";
		}
		$filterString = implode(" $logic ", $filterArray);
		$this->filter = 'WHERE ' . $filterString;
		return $this;

	}

	/**
	 */
	public function addQuery()
	{
		$this->sql = "INSERT INTO $this->table ($this->fields) VALUES ($this->values)";
		return $this;
	}

	public function getQuery()
	{
		$this->sql = "SELECT $this->fields FROM $this->table $this->filter";
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
		$result = $this->mysqli->query($this->sql);

		if ($result == false) {
			return [];
		}

		$fetchResult = [];
		while ($row = $result->fetch_array(MYSQLI_ASSOC))
		{
			$fetchResult[] = $row;
		}

		return $fetchResult;
	}

}