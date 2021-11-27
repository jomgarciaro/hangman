<?php

if ($argc !== 2) {
    echo 'Número incorrecto de parámetros';
    exit();
}   

$secretWord = $argv[1];

echo 'Bienvenido al juego del ahorcado.' . PHP_EOL;
echo 'La palabra tiene ' . mb_strlen($secretWord) . ' letras.' . PHP_EOL;

const MAX_ATTEMPS = 10;

$attemps = 0;

$lettersGuessed = [];

do {

    echo 'Por favor digite una letra. ' . PHP_EOL;
    $letter = trim(fgets(STDIN));

    $letters = str_split_unicode($secretWord);

    if (in_array($letter, $letters)) {
        $lettersGuessed[] = $letter;
        echo 'Correcto: ' . get_guessed_word($secretWord, $lettersGuessed) . PHP_EOL;
    } else {
        echo 'Incorrecto: ' .  get_guessed_word($secretWord, $lettersGuessed) . PHP_EOL;
    }

    $attemps++;

} while($attemps < MAX_ATTEMPS && !is_word_guessed($secretWord, $lettersGuessed));

if (is_word_guessed($secretWord, $lettersGuessed)) {
    echo 'Ganaste' . PHP_EOL;
} else {
    echo 'Perdiste' . PHP_EOL;
}
function is_word_guessed($secretWord, $lettersGuessed) {
    return $secretWord === get_guessed_word($secretWord, $lettersGuessed);
}

function str_split_unicode($str) {
    return preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
}

function get_guessed_word($secretWord, $lettersGuessed) {
    
    $letters = str_split_unicode($secretWord);
    $guessedWord = '';

    foreach ($letters as $letter) {
        if (in_array($letter, $lettersGuessed)) {
            $guessedWord .= $letter;
        } else {
            $guessedWord .= '_';
        }
    }

    return $guessedWord; 
}
