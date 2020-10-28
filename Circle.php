<?php

error_reporting(E_ALL);

require_once 'Figure.php';

/**
 * Class circle Вспомогательный класс для вычисления площади круга
 */
class Circle extends Figure
    {

	//const PI = 3.1416;

    /**
     * @var float Вычисленный по точкам радиус круга
     */
	private $radiusLength;

    /**
     * circle constructor.
     * @param float $x1 позиция точки 1
     * @param float $y1 позиция точки 2
     * @param float $x2 позиция точки 3
     * @param float $y2 позиция точки 4
     */
	public function __construct ($x1, $y1, $x2, $y2)
	{
		$this->radiusLength = sqrt(($x2 - $x1)**2 + ($y2 - $y1)**2);

	}

    /**
     * Вычисляет площадь
     * @return float|int
     */
	public function calculateArea()
	{
		return M_PI*($this->radiusLength*$this->radiusLength);
	}
}

$circle = new circle(
	$_POST['CenterX'], 
	$_POST['CenterY'],
	$_POST['RadX'],
	$_POST['RadY']
);
$circleArea = $circle->calculateArea();
echo $circleArea;
?>

<html>
<body>
<form name = "DataBaseSend" action = "api.php" method="post" accept-charset="utf-8">
    <input type = "submit" value = "Перейти к базе данных">
</form>
</body>
</html>
