<?php

namespace App\Constant;

class ProgressionStatus
{
    public const PLANNING = 'planning';
    public const ONGOING = 'ongoing';
    public const DONE = 'done';

    public static $statusTexts = [
        'planning' => 'Planning',
        'ongoing' => 'Ongoing',
        'done' => 'Done',
    ];

    public static $indonesiaText = [
        'planning' => 'Perencanaan',
        'ongoing' => 'Sedang Berlangsung',
        'done' => 'Selesai',
    ];

    public static function normalizedText(String $text){
        return self::$statusTexts[$text] ?? 'Unknown Type';
    }

    public static function indonesiaText(String $text){
        return self::$indonesiaText[$text] ?? 'Unknown Type';
    }
}
