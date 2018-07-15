<?php

namespace App\Http\Services;

use App\Dates\Carbon;
use Yasumi\Yasumi;

class ShoppingSundayResolver
{
    private $christmas;
    /** @var \Yasumi\Provider\AbstractProvider */
    private $holidays;

    public function __construct()
    {
        $this->christmas = Carbon::createFromDate(2018, 12, 24);
        $this->holidays = Yasumi::create('Poland', 2018);
    }

    /**
     * @param Carbon $sunday
     * @return bool
     */
    public function isShoppingSunday(Carbon $sunday)
    {
        if ($sunday->dayOfWeek !== 0) {
            return false;
        }

        if ($this->holidays->isHoliday($sunday)) {
            return false;
        }

        if ($this->isBeforeChristmas($sunday)) {
            return true;
        }

        if ($this->isMarginSunday($sunday)) {
            return true;
        }

        return false;
    }

    /**
     * @param Carbon $sunday
     * @return bool
     */
    private function isMarginSunday(Carbon $sunday): bool
    {
        if (!$sunday->copy()->subWeek()->isSameMonth($sunday)) {
            return true;
        }

        if (!$sunday->copy()->addWeek()->isSameMonth($sunday)) {
            return true;
        }
        return false;
    }

    /**
     * @param Carbon $sunday
     * @return bool
     */
    private function isBeforeChristmas(Carbon $sunday): bool
    {
        return $sunday->copy()->diffInDays($this->christmas) < 14;
    }
}