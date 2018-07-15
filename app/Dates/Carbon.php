<?php

namespace App\Dates;

use Carbon\Carbon as BaseCarbon;

class Carbon extends BaseCarbon
{
    /**
     * @param string $format
     * @return mixed|string
     */
    public function formatLocalized($format)
    {
        $result = parent::formatLocalized($format);
        $result = str_replace('styczeń', 'stycznia', $result);
        $result = str_replace('luty', 'lutego', $result);
        $result = str_replace('marzec', 'marca', $result);
        $result = str_replace('kwiecień', 'kwietnia', $result);
        $result = str_replace('maj', 'maja', $result);
        $result = str_replace('czerwiec', 'czerwca', $result);
        $result = str_replace('lipiec', 'lipca', $result);
        $result = str_replace('sierpień', 'sierpnia', $result);
        $result = str_replace('wrzesień', 'września', $result);
        $result = str_replace('październik', 'października', $result);
        $result = str_replace('listopad', 'listopada', $result);
        $result = str_replace('grudzień', 'grudnia', $result);

        return $result;
    }

}