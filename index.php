<?php
//error_reporting(E_ALL);
//ini_set('display_errors', '1');

include 'file_lib.php';

if(isset($_POST["options"]))
{
	$m = 0;

	$list = explode("\n", $_POST["options"]);
	$roversCount = (count($list)-1)/2;

	$Plateau = new Plateau;
	$stringPlateau = explode(" ", $list[0]);
	$Plateau->setSize((int)$stringPlateau[0], (int)$stringPlateau[1]);

	for ($i = 1; $i <= $roversCount; $i++) {
		$stringPosition = array();
		$Rovers = new Rovers;
		$stringPosition = explode(" ", $list[1 + $m]);
		$Rovers->setPosition((int)$stringPosition[0], (int)$stringPosition[1]);
		$Rovers->setDirection(trim($stringPosition[2]));
		
		$Handler = new Handler($Plateau, $Rovers);
		$Handler->control(trim($list[2 + $m]));

		echo $Rovers->getPosition()['x'] . ' ' . $Rovers->getPosition()['y'] . ' ' . $Rovers->getDirection() . '<br>';

		$m += 2;
	}
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Test</title>
</head>
<body>
	<form action="" method="POST">
		<textarea name="options" cols="30" rows="10"></textarea>
		<br>
		<input type="submit" value="Send">
	</form>
</body>
</html>