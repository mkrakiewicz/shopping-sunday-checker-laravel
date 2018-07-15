<?php

namespace App\Structs;

use Carbon\Carbon;

class SundayInfo
{
    /** @var Carbon */
    public $date;
    /** @var bool */
    public $isShoppingSunday;

    /**
     * QuestionData constructor.
     * @param Carbon $date
     * @param bool $isShoppingSunday
     */
    public function __construct(Carbon $date, bool $isShoppingSunday)
    {
        $this->date = $date;
        $this->isShoppingSunday = $isShoppingSunday;
    }
}