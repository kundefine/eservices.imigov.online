<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Company extends Model
{
    protected $guarded = ["id"];
    protected $appends = ["logo_url", "water_mark_url"];


    public function getLogoUrlAttribute($key)
    {
        if($this->logo) return Storage::disk('admin_upload')->url('/company/logo/' . $this->logo);
        return null;
    }

    public function getWaterMarkUrlAttribute($key)
    {
        if($this->water_mark) return Storage::disk('admin_upload')->url('/company/water_mark/' . $this->water_mark);
        return null;
    }

    use HasFactory;
}
