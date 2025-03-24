<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table='experiences';
    protected $fillable=['position','company','from_year','to_year','description'];
    protected $hidden = ['created_at', 'updated_at'];

    public function getFromYearAttribute(): string
    {
        if (isset($this->attributes['from_year'])) {
            return $this->attributes['from_year'];
        }
        if (isset($this->attributes['from'])) {
            $date = DateTime::createFromFormat('Y-m-d', $this->attributes['from']);
            return $date ? $date->format('M Y') : 'Invalid date';
        }
        return 'Invalid date';
    }

    public function getToYearAttribute(): string
    {
        if (isset($this->attributes['to_year'])) {
            return $this->attributes['to_year'];
        }
        if (isset($this->attributes['to'])) {
            $date = DateTime::createFromFormat('Y-m-d', $this->attributes['to']);
            return $date ? $date->format('M Y') : 'Invalid date';
        }
        return 'Invalid date';
    }


}
