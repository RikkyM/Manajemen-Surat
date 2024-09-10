<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Skd extends Model
{
    use HasFactory;

    protected $table = 'skd';

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
