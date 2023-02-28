<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8">
</head>

<body>
<?php
    // задание 3

    /*

        Рассуждение:

            У кажого города есть свой код города,
            значит нужно вытащить город с которого он заходит(по IP)
            затем сравнить - присутствует компания а данном городе?
            Если да - выводим местный код города,
            ещё - выводим код по умолчанию - 800.


        Логика скрипта:

        1) Подключаю библиотеку IP Geolocation API для определения города пользователя
        2) Если город совпадает с существующим - то меняем код города телефона,
            Если нет - оставляем 8-800 по умолчанию
        3) Добавляем код города на в телефон на странице

        Решение развернул на сервере вот тут http://tilda.guarchibaoline.pro/
    */

    /*
     * Принцип работы апишки
     * IP Geolocation API http://ip-api.com – бесплатен для некоммерческого использования, ключ к API не требуется.
     * Сервис возвращает данные в формате JSON, XML, CSV, Newline, PHP (serialize) по GET-запросу.
     *
     */

    $defaultCode = "800"; // код города по умолчанию
    $cityCode = ""; // код города

    // С помощью такого скрипта получаем город

    $ch = curl_init('http://ip-api.com/json/' . $_SERVER['REMOTE_ADDR'] . '?lang=ru');

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    curl_setopt($ch, CURLOPT_HEADER, false);

    $res = curl_exec($ch);

    curl_close($ch);

    $res = json_decode($res, true);

    // Вытаскиваем название города

    foreach ($res as $key => $value) {

        if ($key == "city") {

            if ($value == "Москва") {

                $cityCode = "495";

            } elseif($value == "Алматы") {

                $cityCode = "727";

            } elseif($value == "Санкт-Петербург") {

                $cityCode = "812";

            } else {

                $cityCode = $defaultCode;

            }
        }
    }


    ?>
 <!-- Добавлем код города в телефон -->
<header>
    <div class=phone><a href="tel:+7<?php echo $cityCode ?>DIGITS">8-<?php echo $cityCode ?>-DIGITS</a></div>
</header>
<footer>
    <div class=phone><a href="tel:+7<?php echo $cityCode ?>DIGITS">8-<?php echo $cityCode ?>-DIGITS</a></div>
</footer>


</body>
</html>
