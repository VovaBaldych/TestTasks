<?php
    $options = array(                                                                       // оголошуємо набір обов'язкових параметрів для PDO
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,                                        // вказуємо режим виводу помилок
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_COLUMN                                   // фетч
    ); 

    $pdo = new PDO('mysql:host=localhost;dbname=linker','root','', $options);             // інціалізуємо БД
?>
<form action="" method="post">
    <input type="text" name="url_full" id="url_full">
    <input type="submit" name="make_short" value="Скоротити посилання">
</form>
<?
    $url=$_POST['url_full'];

    $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
    $numChars = strlen($chars);
    $string = '';
    for ($i = 0; $i < 5; $i++) {
    $string .= substr($chars, rand(1, $numChars) - 1, 1);
    }

    $input = $pdo->exec("INSERT INTO links(long_link,short_link) VALUES ('$url','$string')");
    echo 'Повне посилання - '.$url.'<br>';
    echo 'Ваше нове посилання - <a href="'.$url.'">short.link/'.$string;

?>