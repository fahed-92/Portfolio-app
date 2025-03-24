<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillsCategory extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table='skills_categories';
    protected $fillable=['name'];

    public function Skills()
    {
        return $this->hasMany(Skill::class, 'skills_category_id' );
    }
}
