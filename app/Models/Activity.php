<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Activity extends Model
{
    use HasFactory;
    public function project()
    {
        return $this->belongsTo(Project::class);
    }


    protected $fillable = [
        'output_id', 
        'title', 
        'target', 
        'q1_progress', 
        'total_participants', 
        'male_participants', 
        'female_participants', 
        'budget', 
        'progress_percentage', 
        'comments'
    ];

    public function output()
    {
        return $this->belongsTo(Output::class);
    }
}
