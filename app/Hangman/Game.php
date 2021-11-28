<?php

namespace App\Hangman;

class Game
{
    const MAX_FAILED_ATTEMPS = 5;

    protected $secretWord;

    protected $attemps;

    protected $lettersGuessed;

    public function __construct($secretWord)
    {
        $this->secretWord = $secretWord;
        $this->attemps = count(StringHelper::explodeUnique($secretWord)) + self::MAX_FAILED_ATTEMPS;
        $this->lettersGuessed = [];
    }

    public function getAttemps(): int
    {
        return $this->attemps;
    }

    public function guess(string $letter): bool
    {
        $this->attemps--;

        $letters = StringHelper::strSplitUnicode($this->secretWord);

        if (in_array($letter, $letters)) {
            $this->lettersGuessed[] = $letter;
            return true;
        }

        return false;
    }
    
    public function hasRemainingAttemps(): bool 
    {
        return $this->attemps > 0;
    }

    public function getGuessedWord(): string {
    
        $letters = StringHelper::strSplitUnicode($this->secretWord);
        $guessedWord = '';

        foreach ($letters as $letter) {
            $guessedWord .= in_array($letter, $this->lettersGuessed) ? $letter : '_';
        }

        return $guessedWord; 
    }

    function isWordGuessed(): bool 
    {
        return $this->secretWord === $this->getGuessedWord();
    }
}