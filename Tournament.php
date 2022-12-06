<?php

declare(strict_types=1);

class Tournament
{
    public function __construct()
    {

    }

    public function tally(string $scores): string
    {
        $arrayOfScores = explode(PHP_EOL, $scores);
        foreach ($arrayOfScores as $scoreArray) {
            $this->extractGameResults($scoreArray);
        }
        print_r($arrayOfScores);

        return 'Team                           | MP |  W |  D |  L |  P';
    }

    private function extractGameResults(string $gameResult) {
        [$homeTeam, $foreignTeam, $outcome] = explode(';', $gameResult);

    }
}
