<?php

class Plateau
{

	private $x;
	private $y;

	public function setSize(int $x, int $y)
	{
		$this->x = $x;
		$this->y = $y;

		return true;
	}

	public function getSize()
	{
		$array['x'] = $this->x;
		$array['y'] = $this->y;

		return $array;
	}

}