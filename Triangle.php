<?php

error_reporting(E_ALL);
spl_autoload_register(function ($class)
{

    $path = __DIR__ . $class . '.php';

    if (file_exists($path))
    {
        require_once $path;
    }

});

/**
 * Class triangle вспомогательный класс для вычисления площади треугольника
 */

	class Triangle extends Figure
	 {
        /**
         * @var float вычисленные по точкам длины сторон треугольника
         */

	    private $sideABLenght;
	    private $sideBCLenght;
	    private $sideACLenght;

        /**
         * triangle constructor.
         * @param float $x1 позиция точки A по оси X
         * @param float $y1 позиция точки A по оси Y
         * @param float $x2 позиция точки B по оси X
         * @param float $y2 позиция точки B по оси Y
         * @param float $x3 позиция точки С по оси X
         * @param float $y3 позиция точки С по оси Y
         */

        public function __construct (float $x1, float $y1,float $x2, float $y2, float $x3, float $y3)
        {
            $this->sideABLenght = sqrt(($x2 - $x1)*($x2 - $x1)
                + ($y2 - $y1)*($y2 - $y1));
            $this->sideBCLenght = sqrt(($x3 - $x2)*($x3 - $x2)
                + ($y3 - $y2)*($y3 - $y2));
            $this->sideACLenght = sqrt(($x1 - $x3)*($x1 - $x3)
                + ($y1 - $y3)*($y1 - $y3));
        }

        /**
         * @return float вычисление полупериметра треугольника
         */

        public function calculateHalfPerimeter(): float
        {
            return ($this->sideABLenght + $this->sideBCLenght + $this->sideACLenght)/2;
        }

        /***
         * @return float вычисляет площадь
         */

        public function calculateArea()
        {
            return sqrt($this->calculateHalfPerimeter()*($this->calculateHalfPerimeter() - $this->sideABLenght)*
                ($this->calculateHalfPerimeter() - $this->sideBCLenght)*($this->calculateHalfPerimeter() - $this->sideACLenght));
        }
}
$triangle = new Triangle(
    $_POST['AonX'],
    $_POST['AonY'],
    $_POST['BonX'],
    $_POST['BonY'],
    $_POST['ConX'],
    $_POST['ConY']
);
$TriangleArea = $triangle->calculateArea();
echo $TriangleArea;
?>

<html>
<body>
<form name = "DataBaseSend" action = "api.php" method="post" accept-charset="utf-8">
    <input type = "submit" value = "Перейти к базе данных">
</form>
</body>
</html>
