<?php

namespace App\Traits;

trait EnumValues{
    public static function getAllValues(): array
    {
        return array_column(self::cases(), 'value');
    }
}