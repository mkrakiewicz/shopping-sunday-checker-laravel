<?php

use App\Http\Services\ShoppingSundayResolver;
use App\Dates\Carbon;


$rs = new ShoppingSundayResolver();
$d = Carbon::createFromDate(2018, 12, 9);

$r = $rs->isShoppingSunday($d);

var_dump($r);

exit;