<?php

namespace App\Models;

use Database\Factories\SentEmailFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SentEmail extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function newFactory(): SentEmailFactory
    {
        return SentEmailFactory::new();
    }
}
