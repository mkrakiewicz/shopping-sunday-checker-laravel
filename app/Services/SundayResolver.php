<?php

namespace App\Http\Services;

use App\Dates\Carbon;

class SundayResolver
{
    /**
     * @param $today
     * @return Carbon
     */
    public function findNextOrToday(Carbon $today)
    {
        $result = $today->copy();

        if ($today->dayOfWeek === 0) {
            return $result;
        }

        return $result->endOfWeek();
    }
}