<?php

declare(strict_types= 1);

namespace TennisGame;
class Player {
    private string $name;
    private int $score;

    public function __construct(string $name, int $score){
        $this->name = $name;
        $this->score = $score;
    }

    public function setScore(int $score = 1): void {
        $this->score += $score;
    }

    public function setName(string $newName): void {
        $this->name = $newName;
    }
}