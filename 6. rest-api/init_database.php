<?php
    $options = array(                                                                       // оголошуємо набір обов'язкових параметрів для PDO
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,                                        // вказуємо режим виводу помилок
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_COLUMN                                   // фетч
    ); 

    try
    {
        $pdo = new PDO('mysql:host=localhost;dbname=rest_api','root','', $options);         // інціалізуємо БД
    }
    catch (PDOException $e)
    {
        print "Error!: " . $e->getMessage();                                                // якщо відбулась помилка при ініціалізації БД - говоримо про це
        die();                                                                              // завершуємо роботу скрипту в разі невдачі
    }
?>