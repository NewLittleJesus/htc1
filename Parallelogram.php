<?php

error_reporting(E_ALL);

	require_once 'Figure.php';

/**
 * Class parallelogram вспомогающий класс для вычисления площади параллелограмма
 */
	class Parallelogram extends Figure

{
        /**
         * @var float вычисленные по точкам длины сторон параллелограмма
         */
        private $vectorABcoordinateX;
        private $vectorABcoordinateY;
        private $vectorACcoordinateX;
        private $vectorACcoordinateY;


        /**
         * parallelogram constructor
         * @param float $x1
         * @param float $y1
         * @param float $x2
         * @param float $y2
         * @param float $x3
         * @param float $y3
         */

	public function __construct (float $x1, float $y1, float $x2, float $y2, float $x3, float $y3)
	{
        $this->vectorABcoordinateX = $x2 - $x1;
        $this->vectorABcoordinateY = $y2 - $y1;
        $this->vectorACcoordinateX = $x3 - $x1;
        $this->vectorACcoordinateY = $y3 - $y1;

	}
	public function vectorMultiplication(): float
		{
			return ($this->vectorABcoordinateX *  $this->vectorACcoordinateY)
                -($this->vectorACcoordinateX * $this->vectorABcoordinateY);
		}
        public function calculateArea()
        {
	        return sqrt($this->vectorMultiplication()*$this->vectorMultiplication());
        }

}
$parallelogram = new Parallelogram(
    $_POST['AonX'],
    $_POST['AonY'],
    $_POST['BonX'],
    $_POST['BonY'],
    $_POST['ConX'],
    $_POST['ConY']
);
$ParallelogramArea = $parallelogram->calculateArea();
echo $ParallelogramArea;
?>

<html>
<body>
<form name = "DataBaseSend" action = "api.php" method="post" accept-charset="utf-8">
    <input type = "submit" value = "Перейти к базе данных">
</form>
</body>
</html>
