<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'skills';
    protected $guarded=[];
    protected $fillable = ['skill', 'percentage', 'skills_category_id'];

    public function Skill_category()
    {
        return $this->belongsTo(SkillsCategory::class, 'skills_category_id');
    }
}
