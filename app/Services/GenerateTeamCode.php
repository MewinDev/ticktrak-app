<?php

namespace App\Teams\Services;

use App\Models\Teams\Team;

class GenerateTeamCode {

    public function generateCode() {
        // Generate a unique team_code (e.g., random 10-character string)
        do {
            $teamCode = strtoupper(str()->random(10));
        } while (Team::where('team_code', $teamCode)->exists());

        return $teamCode;
    }
}
