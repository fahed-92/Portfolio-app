<?php

namespace App\Models;

use App\Events\VisitorCountUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip_address',
        'user_agent',
        'device',
        'browser',
        'platform',
        'location',
        'visited_at'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected static function booted()
    {
        static::created(function ($visitor) {
            $visitorCount = static::count();
            event(new VisitorCountUpdated($visitorCount));
        });
    }

}
