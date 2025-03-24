<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'services';
    protected $fillable = ['service', 'icon', 'description'];
    protected $hidden = ['created_at', 'updated_at'];

}
