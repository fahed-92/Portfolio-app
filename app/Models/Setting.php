<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Position;
use App\Models\Link;


class Setting extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table='settings';
    protected $fillable=['name','photo'];

    public function Positions()
    {
        return $this->hasMany(Position::class, 'setting_id' );
    }
    public function Links()
    {
        return $this->hasMany(Link::class, 'setting_id' );
    }
}
