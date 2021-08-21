<?php

namespace App\Constant;

class ProgressionStatus
{
    public const PLANNING = 'planning';
    public const ONGOING = 'ongoing';

    public static $statusTexts = [
        'planning' => 'Planning',
        'ongoing' => 'Ongoing',
    ];

    public static $indonesiaText = [
        'planning' => 'Perencanaan',
        'ongoing' => 'Sedang Berlangsung',
    ];

    public static function normalizedText(String $text){
        return self::$statusTexts[$text] ?? 'Unknown Type';
    }

    public static function indonesiaText(String $text){
        return self::$indonesiaText[$text] ?? 'Unknown Type';
    }
}
