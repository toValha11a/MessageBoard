<?php

namespace Poc\Classes;

use Poc\Interfaces\CalculateSquare;

class Rectangle implements CalculateSquare
{
	private $x;
	private $y;

	public function __construct(float $x, float $y)
	{
		$this->x = $x;
		$this->y = $y;
	}

	public function calculateSquare(): float
	{
		return $this->x * $this->y;
	}
}