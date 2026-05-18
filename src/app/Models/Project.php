<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'thumbnail',
        'github_url',
        'is_final_project',
        'pdf_report',
        'progress_status',
        'is_published',
    ];

    protected $casts = [
        'is_final_project' => 'boolean',
        'is_published' => 'boolean',
    ];
}
