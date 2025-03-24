<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Setting;

class Position extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table='positions';
    protected $fillable=['position','setting_id'];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function Setting()
    {
        return $this->belongsTo(Setting::class);
    }
}
