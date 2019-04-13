<?php

class BowlingGame
{
    const TURNS_PER_GAME = 10;
    private $rolls = [];


    public function roll($pins)
    {
        $this->guardAgainstInvalidRoll($pins);
        $this->rolls[] = $pins;
    }

    public function score()
    {
        $score = 0;
        $roll = 0;
        for($turn = 1; $turn <= self::TURNS_PER_GAME; $turn++) {
            if ($this->isStrike($roll))
            {
                $score += 10 + $this->strikeBonus($roll);
                $roll += 1;
            }
            elseif ($this->isSpare($roll))
            {
                $score += 10 + $this->spareBonus($roll);
                $roll += 2;
            }
            else
            {
                $score += $this->getDefaultTurnScore($roll);
                $roll += 2;
            }
        }

        return $score;
    }

    private function guardAgainstInvalidRoll($pins)
    {
        if($pins < 0) {
            throw new InvalidArgumentException("Knocked down pins can't be lower than 0.");
        }
    }

    private function isStrike($roll)
    {
        return $this->rolls[$roll] === 10;
    }

    private function isSpare($roll)
    {
        return $this->rolls[$roll] + $this->rolls[$roll + 1] === 10;
    }

    private function getDefaultTurnScore($roll)
    {
        return $this->rolls[$roll] + $this->rolls[$roll + 1];
    }

    private function spareBonus($roll)
    {
        return $this->rolls[$roll + 2];
    }

    private function strikeBonus($roll)
    {
        return $this->rolls[$roll + 1] + $this->rolls[$roll + 2];
    }

}
