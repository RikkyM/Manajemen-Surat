<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skk extends Model
{
    use HasFactory;

    protected $table = 'skk';

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
