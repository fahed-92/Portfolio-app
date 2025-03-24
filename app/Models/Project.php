<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'portfolios';
    protected $fillable = ['name', 'category', 'link', 'image', 'description'];
    protected $hidden = ['created_at', 'updated_at'];
}
