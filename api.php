<?php

error_reporting(E_ALL);

require_once 'Circle.php';
require_once 'Triangle.php';
require_once 'Parallelogram.php';

switch ($type) {
    case 'Круг' :
        $x1 = $_POST['CenterX'];
        $y1 = $_POST['CenterY'];
        $x2 = $_POST['RadX'];
        $y2 = $_POST['RadY'];
        $area = $circleArea;
    break;
    case 'Треугольник' :
        $x1 = $_POST['AonX'];
        $y1 = $_POST['AonY'];
        $x2 = $_POST['BonX'];
        $y2 = $_POST['BonY'];
        $x3 = $_POST['ConX'];
        $y3 = $_POST['ConY'];
        $area = $TriangleArea;
    break;
    case 'Параллелограмм' :
        $x1 = $_POST['AonX'];
        $y1 = $_POST['AonY'];
        $x2 = $_POST['BonX'];
        $y2 = $_POST['BonY'];
        $x3 = $_POST['ConX'];
        $y3 = $_POST['ConY'];
        $area = $ParallelogramArea;
    break;

}

$db = new SQLite3("test.db");

$firstpoint = "INSERT INTO points (x,y) VALUES (:x1, :y1)";
$sth = $db->prepare($firstpoint);
$sth->bindParam('x1',$x1);
$sth->bindParam('y1',$y1);
$sth->execute();


$secondpoint = "INSERT INTO points (x,y) VALUES (:x2, :y2)";
$sth = $db->prepare($secondpoint);
$sth->bindParam('x2',$x2);
$sth->bindParam('y2',$y2);
$sth->execute();

$thirdpoint = "INSERT INTO points (x,y) VALUES (:x3, :y3)";
$sth = $db->prepare($thirdpoint);
$sth->bindParam('x3',$x3);
$sth->bindParam('y3',$y3);
$sth->execute();


$pointid = "INSERT INTO params (point_id) SELECT id FROM points";
$sth = $db->prepare($pointid);

$sth->execute();

//$pointtype = 2 ;
//$figureid = 2;

$figure = "INSERT INTO figures (figure,area) VALUE (:type,:area)";
$sth = $db->prepare($figure);
$sth->bindParam('type',$type);
$sth->bindParam('area',$area);
$sth->execute();






