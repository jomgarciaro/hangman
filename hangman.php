<?php

if ($argc !== 2) {
    echo 'Número incorrecto de parámetros';
    exit();
}   

$secretWord = $argv[1];

echo 'Bienvenido al juego del ahorcado.' . PHP_EOL;
echo 'La palabra secreta tiene ' . mb_strlen($secretWord) . ' letras.' . PHP_EOL;