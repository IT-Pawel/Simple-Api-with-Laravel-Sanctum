<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\KursFactory;

class Kurs extends Model
{
    use HasFactory;

    protected $table = 'kursy';

    protected $fillable = [
        'currency',
        'date',
        'amount'
    ];

    public static function factory()
    {
        return KursFactory::new();
    }

}
