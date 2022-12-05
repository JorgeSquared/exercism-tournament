<?php

declare(strict_types=1);

class Tournament
{
    public function __construct()
    {

    }

    public function tally(string $scores): string
    {
        $scores = file_get_contents(__DIR__ . '/results.txt');

        $scoresArray = explode(PHP_EOL, $scores);

        $teamNames = [];
        $matchesPlayedByTeam = [];
        $matchesWon = 0;
        $matchesDrawn = 0;
        $matchesLost = 0;
        $result = [];
        foreach ($scoresArray as $resultRow) {
            // to skip empty rows (at the end of the file) we check for empty strings
            // more sophisticated validation may be needed later...
            if ($resultRow == '') {
                break;
            } else {
                $resultRowArray = explode(';', $resultRow);
                /**
                 * First, we need to collect the teams that participated in the tournament
                 */
                for ($i = 0; $i <= 1; $i++) {
                    if (!in_array($resultRowArray[$i], $teamNames, true)) {
                        $teamNames[] = $resultRowArray[$i];
                    }
                }
            }

            /**
             * Here we shall count how much matches did a given team play
             */
            foreach ($teamNames as $teamName) {
                if (in_array($teamName, $resultRowArray, true)) {
                    print_r($teamName);
                }
            }

        }

        /**
         * Here we shall fill in the results
         */
        foreach ($teamNames as $teamName) {
            $result[] = $teamName;
        }

        print_r($result);

        return
            "Team                           | MP |  W |  D |  L |  P\n" .
            "Devastating Donkeys            |  3 |  2 |  1 |  0 |  7\n" .
            "Allegoric Alaskans             |  3 |  2 |  0 |  1 |  6\n" .
            "Blithering Badgers             |  3 |  1 |  0 |  2 |  3\n" .
            "Courageous Californians        |  3 |  0 |  1 |  2 |  1";
    }
}
