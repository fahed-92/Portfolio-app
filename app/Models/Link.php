<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table='links';
    protected $fillable=['link','icon','setting_id'];

    public function Setting()
    {
        return $this->belongsTo(Setting::class, 'setting_id' );
    }
}
