<?php

namespace App\Http\Services;

use App\Structs\QuestionData;
use App\Dates\Carbon;

class QuestionResolver
{
    /**
     * @param Carbon $today
     * @return QuestionData
     */
    public function resolve(Carbon $today): QuestionData
    {
        return new QuestionData(
            'Czy ' . $this->resolveWhen($today) . ' ' . $this->resolveEnd($today) . '?'
        );
    }

    /**
     * @param Carbon $today
     * @return string
     */
    private function resolveWhen(Carbon $today)
    {
        switch ($today->dayOfWeek) {
            case 0:
                return 'dzisiaj';
            case 5:
                return 'pojutrze';
            case 6:
                return 'jutro';
            default:
                return 'następna niedziela';
        }
    }

    /**
     * @param Carbon $today
     * @return string
     */
    private function resolveEnd(Carbon $today)
    {
        switch ($today->dayOfWeek) {
            case 0:
            case 5:
            case 6:
                return 'jest niedziela handlowa';
            default:
                return 'będzie niedzielą handlową';
        }
    }
}
