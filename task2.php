<!DOCTYPE html>
<html>
<body>

<?php
// Задание 2

    $summOfRows = []; // массив принимающий суммы всех строк
    $summOfCols = []; // массив принимающий суммы всех столбцов

    // Создаём двухмерный массив

    for($i = 1; $i <= 5; $i++) { // создаём 5 строк

        for($j = 1; $j <= 7; $j++){ // создаём 7 столбцов
            $numbers[$i][$j] = rand(1,1000);
        }

    }

    // Выводим массив
    echo "двухмерный массив 5x7";

    echo '<pre>', print_r($numbers, true), '</pre>';

    for ($row = 1; $row <= 5; $row++) { //

        for ($col = 1; $col <= 7; $col++) {

            $summOfRows[$row] += $numbers[$row][$col];

            $summOfCols[$col] += $numbers[$row][$col];
        }

    }
    echo "Суммы всех строк";
    echo '<pre>', print_r($summOfRows, true), '</pre>';
    echo "Суммы всех столбцов";
    echo '<pre>', print_r($summOfCols, true), '</pre>';

?>
</body>
</html>
