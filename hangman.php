<?php

include_once('vendor/autoload.php');

use Hangman\Game;

if ($argc !== 2) {
    echo 'Número incorrecto de parámetros';
    exit();
}   

$secretWord = $argv[1];

echo 'Bienvenido al juego del ahorcado.' . PHP_EOL;
echo 'La palabra tiene ' . mb_strlen($secretWord) . ' letras.' . PHP_EOL;

$game = new Game($secretWord);

do {

    echo 'Por favor digite una letra. ' . PHP_EOL;

    $letter = trim(fgets(STDIN));

    if ($game->guess($letter)) {
        echo 'Correcto: ' . $game->getGuessedWord() . PHP_EOL;
    } else {
        echo 'Incorrecto: ' .  $game->getGuessedWord() . PHP_EOL;
    }

    if (!$game->isWordGuessed()) {
        echo 'Tienes ' . $game->getAttemps() . ' intentos restantes.' . PHP_EOL;
    }
} while($game->hasRemainingAttemps() && !$game->isWordGuessed());

$result = $game->isWordGuessed() ? 'Ganaste.' : 'Perdiste.';

echo $result . PHP_EOL;