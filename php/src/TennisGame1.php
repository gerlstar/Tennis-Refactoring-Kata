<?php

declare(strict_types=1);

namespace TennisGame;

class TennisGame1 implements TennisGame
{
    private int $m_score1 = 0;

    private int $m_score2 = 0;

    // private const PLAYER_ONE = 'player1';
    // private const PLAYER_TWO = 'player2';
    private string $playerOneName = '';
    private string $playerTwoName = '';

    private array $scoreLabels = [
      'Love', 'Fifteen', 'Thirty', 'Forty'
    ];

    private Player $playerOne;
    private Player $playerTwo;

    // public function __construct(
    //     private Player $player1,
    //     private Player $player2
    // ) {
    //     $this->playerOne = $player1;
    //     $this->playerTwo = $player2;
    // }

    public function __construct(
        private string $player1Name,
        private string $player2Name
    ) {
        $this->playerOneName = $player1Name;
        $this->playerTwoName = $player2Name;
    }

    public function wonPoint(string $playerName): void
    {
        if ($playerName === $this->playerOneName) {
            $this->m_score1++;
            // $this->playerOne->setScore();
        } else {
            $this->m_score2++;
            // $this->playerTwo->setScore();
        }
    }

    private function tiedScore(){
           var_dump('tied score');
        // if ($this->m_score1 === $this->m_score2) {

            return match ($this->m_score1) {
                0 => 'Love-All',
                1 => 'Fifteen-All',
                2 => 'Thirty-All',
                default => 'Deuce',
            };
        // }

        // return '';

    }

    private function setupAdvantageOrWin(){
        $score = '';

        // if ($this->m_score1 >= 4 || $this->m_score2 >= 4) {
            $minusResult = $this->m_score1 - $this->m_score2;

            $score = 'Win for player2';

            if ($minusResult === 1) {
                $score = 'Advantage player1';
            } elseif ($minusResult === -1) {
                $score = 'Advantage player2';
            } elseif ($minusResult >= 2) {
                $score = 'Win for player1';
            } 
        // } 

        return $score;
    }
    // do not edit the name
    // public function getScore2(): string
    // {
    //     $score = '';

    //     $score = $this->tiedScore();

    //     $score = $this->setupAdvantageOrWin();
    //     // if ($this->m_score1 === $this->m_score2) {

    //     //     $score = match ($this->m_score1) {
    //     //         0 => 'Love-All',
    //     //         1 => 'Fifteen-All',
    //     //         2 => 'Thirty-All',
    //     //         default => 'Deuce',
    //     //     };

    //     // } 
        
    //     // if ($this->m_score1 >= 4 || $this->m_score2 >= 4) {
    //     //     $minusResult = $this->m_score1 - $this->m_score2;

    //     //     if ($minusResult === 1) {
    //     //         $score = 'Advantage player1';
    //     //     } elseif ($minusResult === -1) {
    //     //         $score = 'Advantage player2';
    //     //     } elseif ($minusResult >= 2) {
    //     //         $score = 'Win for player1';
    //     //     } else {
    //     //         $score = 'Win for player2';
    //     //     }
    //     // } 
        
    //     else {

    //     // $tempScore = $this->m_score1;

    //      $score .= '-';
    //     $tempScore = $this->m_score2;
    //       $score .= $this->scoreLabels[$this->m_score2];

    //       $score .= $this->scoreLabels[$this->m_score1];

    //         for ($i = 1; $i < 3; $i++) {
    //             if ($i === 1) {
    //                 $tempScore = $this->m_score1;
    //             } else {
    //                 $score .= '-';
    //                 $tempScore = $this->m_score2;
    //             }

    //             $score .= $this->scoreLabels[$tempScore];
              
    //         }
    //     }
    //     return $score;
    // }

    public function getScore(): string
    {
        $score = '';

      
        if ($this->m_score1 === $this->m_score2) {
            $score = $this->tiedScore();
        } 
        else if ( $this->m_score1 >= 4 || $this->m_score2 >= 4) {
            $score = $this->setupAdvantageOrWin();
            // var_dump('dfadfasdf');
            // $minusResult = $this->m_score1 - $this->m_score2;
            
            // $score = 'Win for player2';

            // if ($minusResult === 1) {
            //     $score = 'Advantage player1';
            // } elseif ($minusResult === -1) {
            //     $score = 'Advantage player2';
            // } elseif ($minusResult >= 2) {
            //     $score = 'Win for player1';
            // } 
        } 
        
        else {
            $score .= $this->scoreLabels[$this->m_score1] . '-' . $this->scoreLabels[$this->m_score2];       
        }
        return $score;
    }
}
