<?php
    require 'init_database.php';

    $pieces = explode('/', $_SERVER['REQUEST_URI']);                                        // ділимо URL на слова

    if(strpos($_SERVER['REQUEST_URI'], 'generate', 1) === 1)                       // якщо в URL є обов'язковий підрядок 'rest-api/generate'
    {
        $digit = random_int(0, 1000);
        echo '<h1>Ваше число - '.$digit.'</h1>';
        $query = $pdo->exec('INSERT INTO generate(result) VALUES ("'.$digit.'")');          // записуємо згернероване число в БД
    }
    else if(strpos($_SERVER['REQUEST_URI'], 'get', 1) === 1)                       // якщо в URL є обов'язковий підрядок 'rest-api/get'
    {
        $get_id=end($pieces);                                                               // беремо останнє слово з рядка $pieces
        if(is_numeric($get_id))                                                             // перевіряємо, чи є це слово числом
        {
            $get_id_more = $pdo->prepare("SELECT result FROM generate WHERE id='$get_id'"); // якщо так, то робимо запит до БД
            $get_id_more->execute();
            $final = $get_id_more->fetch();
            printf($r = '<h1 data-test="%1$d" data-more="%2$d">%1$d</h1>', ($final ? $final : 'Invalid'), 3);                 // якщо в БД ID співпадає з числом користувача - виводимо згенероване раніше число
        }
    }
    else {echo 'Sorry, but no!';}
?>