<?php

namespace App\Constant;

class PavementType
{
    public const ASPALT = 'aspalt';
    public const CONCRETE = 'concrete';

    public static $statusTexts = [
        'aspalt' => 'Asplat',
        'concrete' => 'Concrete',
    ];
    
    public static $indonesiaText = [
        'aspalt' => 'Aspal',
        'concrete' => 'Beton',
    ];

    public static function normalizedText(String $text){
        return self::$statusTexts[$text] ?? 'Unknown Type';
    }

    public static function indonesiaText(String $text){
        return self::$indonesiaText[$text] ?? 'Unknown Type';
    }
}