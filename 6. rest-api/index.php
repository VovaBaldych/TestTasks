<?php
    include 'init_database.php';
    include 'functions.php';

    if(strpos($_SERVER['REQUEST_URI'], 'rest-api/generate', 1) === 1)                       // якщо в URL є обов'язковий підрядок 'rest-api/generate'
    {
        generateNumber($pdo);
    }
    else if(strpos($_SERVER['REQUEST_URI'], 'rest-api/get', 1) === 1)                       // якщо в URL є обов'язковий підрядок 'rest-api/get'
    {
        retrieveNumber($pdo);
    } else {echo 'Sorry, but no!';}
?>