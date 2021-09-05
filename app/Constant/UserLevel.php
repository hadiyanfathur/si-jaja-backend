<?php

namespace App\Constant;

class UserLevel
{
    public const ADMINISTRATOR = 0;
    public const PLANNER = 1;
    public const SURVEYOR= 20;

    public static $statusTexts = [
        0 => 'Administrator',
        1 => 'Planner',
        20 => 'Surveyor',
    ];

    public static function normalizedText(String $text){
        return self::$statusTexts[$text] ?? 'Unknown Level';
    }
}
