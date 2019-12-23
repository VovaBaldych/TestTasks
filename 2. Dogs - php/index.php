<?php
    class Dog
    {
        // var $breeds = array('сиба-ину', 'мопс', 'такса', 'плюшевый лабрадор', 'резиновая такса с пищалкой');
        var $breed;
        var $komands = array('');
        var $hunts = array("Я зловив кота", "Я зловив мишку", "Я зловив крота", "Я зловив кроля", "Я зловив рибку", "Я зловив шкарпетка");

        function __construct($name, $breed)
        {
            $this->name = $name;
            $this->breed = $breed;
        }
        function getInfo()
        {
            echo "Привіт, я - $this->name";
            echo "Порода - $this->breed";
        }
        function Sound()
        {
            echo "WOOF! WOOF!";
        }
        function Squeak()
        {
            echo "UIIII! UIIII!";
        }
        function Hunting()
        {
            // $randIndex = array_rand($hunts, 1);
            // echo $hunts[$randIndex];

        }
    }

    class Mops extends Dog
    {
        function Sound()
        {
            echo "Я фігово гавкаю(";
        }
        function Hunting()
        {
            echo "Яке полюввання? Я лінивий пес";
        }
    }
    
    $taksa = new Dog('Josh', 'гумова такса з пищалкою');
    $taksa->get Info();
    echo '<br>';
    $taksa->Squeak();
    echo '<br>';
    $taksa->Sound();
    echo '<br>';
    $taksa->Hunting();

    echo '<br>';

    $mops = new Mops('Jack', 'мопс');
    $mops->getInfo();
    echo '<br>';
    $mops->Squeak();
    echo '<br>';
    $mops->Sound();
    echo '<br>';
    $mops->Hunting();

?>