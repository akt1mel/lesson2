<?php

$key = "23dcc98fe70efc2bb1d8cd5f8f81d656";
$city = $_GET['city'];
$link = "http://api.openweathermap.org/data/2.5/weather?q="."$city"."&appid="."$key"."&units=metric";
$fileName = $city."_".date("dmy").".json";

//Проверяем существует ли файл с погодой в городе за текущую дату
//Если нет, то создаем файл и записываем данные
if(!file_exists($fileName)) {
  //получаем данные от openweathermap по заданному городу
  $weatherApi = json_decode(file_get_contents($link), true);
  file_put_contents($fileName, json_encode($weatherApi));
}

$weather = json_decode(file_get_contents($fileName), true);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Weather</title>
  </head>
  <body>
    <h2><?= $weather['name'];?></h2>
    <p><img src="https://image.ibb.co/dAZhxe/temp.png" alt="Temperature" height="40px">: <?= $weather['main']['temp']?> °C</p>
    <p><img src="https://image.ibb.co/hnhkHe/wind.png" alt="Wind speed" height="40px">: <?= $weather['wind']['speed']?> m/s</p>
    <p><img src="https://image.ibb.co/bE3xVz/humidity.png" alt="Humidity" height="40px">: <?= $weather['main']['humidity']?> %</p>
  </body>
</html>
