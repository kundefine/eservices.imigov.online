<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PraStatus extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'application_date' => 'date',
    ];
}
