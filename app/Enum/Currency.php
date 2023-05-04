<?php 
namespace App\Enum;
use App\Traits\EnumValues;

enum Currency:string{
    use EnumValues;

    case EUR = "EUR";
    case USD = "USD";
    case GBP = "GBP";
}