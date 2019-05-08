<?php

class TennisScoring
{

    private $player1;
    private $player2;

    private $lookup = [
        0 => 'Love',
        1 => 'Fifteen',
        2 => 'Thirty',
        3 => 'Forty'
    ];

    /**
     * TennisScoring constructor.
     * @param Player $player1
     * @param Player $player2
     */
    public function __construct(Player $player1, Player $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }

    /**
     * Returns the string for the current score.
     * @return string
     */
    public function score()
    {
        if($this->hasAWinner()) {
            return 'Win for ' . $this->leader()->name;
        }

        if($this->hasTheAdvantage()) {
            return 'Advantage ' . $this->leader()->name;
        }

        if($this->inDeuce()) {
            return 'Deuce';
        }

        return $this->generalScore();
    }

    /**
     * Checks if the score is tied.
     * @return bool
     */
    private function tied()
    {
        return $this->player1->points == $this->player2->points;
    }

    /**
     * Check if there is a winner.
     * @return bool
     */
    private function hasAWinner()
    {
        return $this->hasEnoughPointsToBeWon() && $this->isLeadingByAtleastTwo();
    }

    /**
     * Returns the leading player.
     * @return Player
     */
    private function leader()
    {
        return $this->player1->points > $this->player2->points ? $this->player1 : $this->player2;
    }

    /**
     * Checks if there is a player with at least 4 points.
     * @return bool
     */
    private function hasEnoughPointsToBeWon()
    {
        return max([$this->player1->points, $this->player2->points]) >= 4;
    }

    /**
     * Checks if the winning player is leading with at least 2 points.
     * @return float|int
     */
    private function isLeadingByAtleastTwo()
    {
        return abs($this->player1->points - $this->player2->points) >= 2;
    }

    /**
     * Checks if someone has the advantage.
     * @return bool
     */
    private function hasTheAdvantage()
    {
        return $this->hasEnoughPointsToBeWon() && $this->isLeadingByOne();
    }

    /**
     * Checks if the players are in deuce.
     * @return bool
     */
    private function inDeuce()
    {
        return $this->player1->points + $this->player2->points >= 6 && $this->tied();
    }

    private function generalScore()
    {
        $score = $this->lookup[$this->player1->points] . '-';

        return $score . ($this->tied() ? 'All' :  $this->lookup[$this->player2->points]);
    }

    /**
     * @return bool
     */
    private function isLeadingByOne(): bool
    {
        return abs($this->player1->points - $this->player2->points) >= 1;
    }
}
