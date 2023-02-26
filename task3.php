<!DOCTYPE html>
<html>
<body>
<?php
    // задание 3

    /*

        Логика скрипта:

        1) Подключаю библиотеку IP Geolocation API для определения города пользователя
        2) Если город совпадает с имеющимся - то меняем код города телефона,
            Если нет - оставляем 8-800 по умолчанию
        3) Добавляем код города в телефон
    */

    /*
     *
     * IP Geolocation API http://ip-api.com – бесплатен для некоммерческого использования, ключ к API не требуется.
     * Сервис возвращает данные в формате JSON, XML, CSV, Newline, PHP (serialize) по GET-запросу.
     *
     */

    $defaultCode = "800"; // код города по умолчанию
    $cityCode = ""; // код города

    // С помощью такого скрипта поолучаем город

    $ch = curl_init('http://ip-api.com/json/' . $_SERVER['REMOTE_ADDR'] . '?lang=ru');

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    curl_setopt($ch, CURLOPT_HEADER, false);

    $res = curl_exec($ch);

    curl_close($ch);

    $res = json_decode($res, true);

    /*

        Возвращается вот такой массив

        Array

    (

        [status] => success

        [country] => Россия

        [countryCode] => RU

        [region] => MOW

        [regionName] => Москва

        [city] => Москва

        [zip] => 129075

        [lat] => 55,7483

        [lon] => 37,6171

        [timezone] => Europe/Moscow

        [isp] => NCNET

        [org] =>

        [as] => AS42610 PJSC Rostelecom

        [query] => 37.110.21.212

    )

    */

    // Но в данном простом примере я буду использовать вот простой массив $res_sample

    $res_sample = Array(

        "city" => "Москва"

    );

    // Вытаскиваем название города

    foreach ($res_sample as $key => $value) {

        if ("{$value}" === "Москва"){ // Уточняю для каких городов ещё нужно

            $cityCode = "495";

        } else {

            $cityCode = $defaultCode;

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
