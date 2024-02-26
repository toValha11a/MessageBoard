<?php

namespace Poc\Classes;

use Poc\Interfaces\CalculateSquare;

class Circle implements CalculateSquare
{
	const PI = 3.1416;
	private $r;
	public function __construct(float $r)
	{
		$this->r = $r;
	}

	public function calculateSquare(): float
	{
		return self::PI * ($this->r ** 2);
	}
	public function hello()
	{
		echo "hello";
	}
}