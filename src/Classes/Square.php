<?php

namespace Poc\Classes;

use Poc\Interfaces\CalculateSquare;

class Square implements CalculateSquare
{
	private $x;

	public function __construct(float $x)
	{
		$this->x = $x;
	}

	public function calculateSquare(): float
	{
		return $this->x ** 2;
	}
}