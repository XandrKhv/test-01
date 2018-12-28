<?php

Class Handler
{

	private $options;
	private $actionPlateau;
	private $actionRovers;
	private $moveOptions = "M";

	public function __construct($actionPlateau, $actionRovers)
	{
		$this->actionPlateau = $actionPlateau;
		$this->actionRovers = $actionRovers;

		if(!$this->actionRovers->getPosition())
		{
			echo "the robot rover is not installed on the platform <br>";
		}
		if(!$this->actionRovers->getDirection())
		{
			echo "direction not set <br>";
		}
		if(!$this->actionPlateau->getSize())
		{
			echo "plateau size not set <br>";
		}
	}

	public function control($options)
	{
		$allControlOptions = str_split($options);

		foreach ($allControlOptions as $value) 
		{
			if($value == $this->moveOptions)
			{
				$this->move($this->actionRovers->getDirection());
			}
			else
			{
				$this->rotate($value);
			}
		}
	}

	private function move($direction)
	{
		if($direction == "N")
		{
			if(($this->actionRovers->getPosition()['y'] + 1) <= $this->actionPlateau->getSize()['y'])
			{
				$this->actionRovers->setPosition($this->actionRovers->getPosition()['x'], $this->actionRovers->getPosition()['y'] + 1);
			}
		}
		elseif($direction == "S")
		{
			if(($this->actionRovers->getPosition()['y'] - 1) >= 0){
				$this->actionRovers->setPosition($this->actionRovers->getPosition()['x'], $this->actionRovers->getPosition()['y'] - 1);
			}
		}
		elseif($direction == "E")
		{
			if(($this->actionRovers->getPosition()['x'] + 1) <= $this->actionPlateau->getSize()['x'])
			{
				$this->actionRovers->setPosition($this->actionRovers->getPosition()['x'] + 1, $this->actionRovers->getPosition()['y']);
			}
		}
		elseif($direction == "W")
		{
			if(($this->actionRovers->getPosition()['x'] - 1) >= 0){
				$this->actionRovers->setPosition($this->actionRovers->getPosition()['x'] - 1, $this->actionRovers->getPosition()['y']);
			}
		}
	}

	private function rotate($direction)
	{

		if($direction == "L")
		{
			if($this->actionRovers->getDirection() == "N")
			{
				$this->actionRovers->setDirection("W");
			}
			elseif($this->actionRovers->getDirection() == "S")
			{
				$this->actionRovers->setDirection("E");
			}
			elseif($this->actionRovers->getDirection() == "E")
			{
				$this->actionRovers->setDirection("N");
			}
			elseif($this->actionRovers->getDirection() == "W")
			{
				$this->actionRovers->setDirection("S");
			}
		}
		elseif($direction == "R")
		{
			if($this->actionRovers->getDirection() == "N")
			{
				$this->actionRovers->setDirection("E");
			}
			elseif($this->actionRovers->getDirection() == "S")
			{
				$this->actionRovers->setDirection("W");
			}
			elseif($this->actionRovers->getDirection() == "E")
			{
				$this->actionRovers->setDirection("S");
			}
			elseif($this->actionRovers->getDirection() == "W")
			{
				$this->actionRovers->setDirection("N");
			}
		}
	}

}