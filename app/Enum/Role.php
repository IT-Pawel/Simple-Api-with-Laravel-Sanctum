<?php 
namespace App\Enum;
use App\Traits\EnumValues;

enum Role:string{
    use EnumValues;

    case ADMIN = "admin";
    case USER = "user";
}