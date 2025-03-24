<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'education';
    protected $fillable = ['faculty', 'major', 'from', 'to', 'university', 'grade'];
    protected $hidden = ['created_at', 'updated_at'];

    public function getFromYearAttribute()
    {
        $date = DateTime::createFromFormat('Y-m-d', $this->attributes['from']);
        return $date ? $date->format('M Y') : 'Invalid date';
    }

    public function getToYearAttribute()
    {
        $date = DateTime::createFromFormat('Y-m-d', $this->attributes['to']);
        return $date ? $date->format('M Y') : 'Invalid date';
    }
}
