<!DOCTYPE html>
<html>
<body>

<?php
// задание 1

$step = 1; // Ступень лесенки

for($i=1; $i<=100;){ // от 1 до 100

    for($a=1; $a<=$step; $a++){ // перебираем все числа в пределах ступени

        if($i <= 100) { // ограничение до 100 включительно во избежание выхода за пределы ТЗ и предостращения багов

            echo $i . " ";
            $i++;

        }

    }
    echo "<br />";
    $step++; // переходим на следующую ступень лесенки

}

?>

</body>
</html>
