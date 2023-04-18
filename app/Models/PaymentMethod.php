<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $guarded = ["id"];
    use HasFactory;

    public function form()
    {
        return $this->belongsTo(FormGenerator::class, 'form_generator_id', 'id');
    }
}
