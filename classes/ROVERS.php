<?php

class Rovers
{

	private $x;
	private $y;
	private $direction;

	public function setPosition(int $x, int $y)
	{
		$this->x = $x;
		$this->y = $y;

		return true;
	}

	public function setDirection($direction)
	{
		$this->direction = $direction;
	}

	public function getPosition()
	{
		$array['x'] = $this->x;
		$array['y'] = $this->y;

		return $array;
	}

	public function getDirection()
	{
		return $this->direction;
	}

}