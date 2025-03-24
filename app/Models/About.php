<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table='abouts';
    protected $fillable=['image','summary','title','birthday','nationality','phone','city','age' , 'degree', 'email','freelance',];
    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
