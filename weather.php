<?php
    $query = 'select * from weather.forecast where woeid in (select woeid from geo.places(1) where text="nome, ak")';
    $api_request = "http://query.yahooapis.com/v1/public/yql?q=" . urlencode($query) . "&format=json";
    $result = file_get_contents($api_request); //получаем данные по url
    $result_decode = json_decode($result); // декодируем json строку
    // echo var_dump($result_decode); //выводим через var_dump для наглядности
    echo '<pre>' . var_export($result_decode->query->results->channel->item->description, true) . '</pre>';
    // echo '<pre>' . var_export(array_keys($result,description)) . '</pre>';