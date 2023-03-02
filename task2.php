<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>

<body>

<?php
// Задание 2

$summOfRows = []; // массив принимающий суммы всех строк
$summOfCols = []; // массив принимающий суммы всех столбцов
$randomNumber = 0; // переменная для получения случаных чисел
$checkDuplicates = []; // вспомагательный массив для проверок на дубликаты
// Создаём двухмерный массив

for($i = 1; $i <= 5; $i++) { // создаём 5 строк

    for($j = 1; $j <= 7; $j++){ // создаём 7 столбцов

        do { // генерируем число, до тех пор, пока не обнаружится, что его нет в вспомагательном массиве

            $randomNumber = mt_rand(1,1000); 

        } while (in_array($randomNumber, $checkDuplicates)); 

        $checkDuplicates[] = $randomNumber; // добавляем в вспомагательный массив новое уникальное число

        $numbers[$i][$j] = $randomNumber; // каждую ячейку заполняем уникальными числами

    }
}

// Выводим массив
echo "двухмерный массив 5x7";

echo '<pre>', print_r($numbers, true), '</pre>';

// Вычисляем суммы по строкам и по столбцам

for ($row = 1; $row <= 5; $row++) { // Перебираем строки

    for ($col = 1; $col <= 7; $col++) { // В каждой строке перебираем столбцы

        $summOfRows[$row] += $numbers[$row][$col]; // Для каждой строки складываем все значения

        $summOfCols[$col] += $numbers[$row][$col]; // Для каждого столбца с соотвествующим $col складываем значения и записываем в отдельный индекс
    }

}

// Выводим результаты
echo "Суммы всех строк";
echo '<pre>', print_r($summOfRows, true), '</pre>';
echo "Суммы всех столбцов";
echo '<pre>', print_r($summOfCols, true), '</pre>';

?>
</body>
</html>
