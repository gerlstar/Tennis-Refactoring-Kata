<?php

declare(strict_types=1);

namespace TennisGame;

class TennisGame1 implements TennisGame
{
    private int $m_score1 = 0;

    private int $m_score2 = 0;

    // private string $playerOneName = '';
    // private string $playerTwoName = '';

    private array $scoreLabels = [
        'Love',
        'Fifteen',
        'Thirty',
        'Forty'
    ];

    public function __construct(
        private string $player1Name,
        private string $player2Name
    ) {}

    public function wonPoint(string $playerName): void
    {
        ($playerName === $this->player1Name) ? $this->m_score1++ 
        : $this->m_score2++;
        
    }

    private function tiedScore()
    {
        return match ($this->m_score1) {
            0 => 'Love-All',
            1 => 'Fifteen-All',
            2 => 'Thirty-All',
            default => 'Deuce',
        };
    }

    private function setupAdvantageOrWin()
    {
        $score = '';

        $minusResult = $this->m_score1 - $this->m_score2;

        $score = 'Win for '.$this->player2Name;

        if ($minusResult === 1) {
            $score = 'Advantage '.$this->player1Name;
        } elseif ($minusResult === -1) {
            $score = 'Advantage '.$this->player2Name;
        } elseif ($minusResult >= 2) {
            $score = 'Win for '.$this->player1Name;
        }


        return $score;
    }

    // do not edit the function name
    public function getScore(): string
    {
        $score = '';

        if ($this->m_score1 === $this->m_score2) {
           return $this->tiedScore();
        } else if ($this->m_score1 >= 4 || $this->m_score2 >= 4) {
            return $this->setupAdvantageOrWin();
        } else {
            $score .= $this->scoreLabels[$this->m_score1] . '-' . $this->scoreLabels[$this->m_score2];
            return $score;
        }
        
    }
}
