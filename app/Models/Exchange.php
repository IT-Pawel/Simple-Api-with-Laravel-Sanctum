<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\ExchangeFactory;

class Exchange extends Model
{
    use HasFactory;

    protected $table = 'exchanges';

    protected $fillable = [
        'currency',
        'date',
        'amount'
    ];

    public static function factory()
    {
        return ExchangeFactory::new();
    }
}
