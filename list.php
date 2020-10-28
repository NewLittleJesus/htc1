<!DOCTYPE html>
<html>
<head>
    <title>Список фигур</title>
    <style type="text/css">
        table {
            border: 1px solid black;
            border-collapse: collapse;
        }
        td, th {
            border: 1px solid black;
            padding: 5px 7px;
        }
    </style>

</head>
<body>
<table>
    <tr>
        <th>Тип фигуры</th>
        <th>Площадь</th>
    </tr>
<?php

$db = new SQLite3("test.db");
$sth = $db->prepare("SELECT type, area FROM figures");
$sth->execute();
$result = $sth->fetchArray();

foreach ($result as $item) {
    ?><tr>
        <td><?=$item['type'] ?></td>
        <td><?=$item['area'] ?></td>
    </tr><?
}
?>
</body>
</html>
</table>
<?php
require_once 'Circle.php';
require_once 'Triangle.php';
require_once 'Parallelogram.php';

$db = new SQLite3("test.db");
$sth = $db->prepare("SELECT type, orders FROM figures");
$sth->execute();
$result = $sth->fetchArray();

foreach ($result as $item) {

}
?>

