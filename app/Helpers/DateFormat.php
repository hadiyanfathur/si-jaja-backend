<?php

namespace App\Helpers;

use Carbon\Carbon;
use Carbon\CarbonInterval;
use Carbon\CarbonPeriod;

class DateFormat
{
    public const EXCLUDE_START_DATE = CarbonPeriod::EXCLUDE_START_DATE;
    public const EXCLUDE_END_DATE = CarbonPeriod::EXCLUDE_END_DATE;

    public static function getIndonesiaDayFromDate($date)
    {
        Carbon::setLocale('id');
        return strtolower(Carbon::parse($date)->settings(['formatFunction' => 'translatedFormat'])->format('l'));
    }

    public static function getTimeBetween($start_time, $end_time, $exclude_date = null)
    {
        return collect(
                CarbonInterval::hours(1)
                ->toPeriod($start_time, $end_time, $exclude_date)
            )->map->format('H:i')->toArray();
    }
}
