<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'title',
        'icon',
        'description',
        'category',
        'items',
        'proficiency',
    ];

    protected $casts = [
        'items' => 'array',
    ];

    public function toViewArray()
    {
        return [
            'title' => $this->title,
            'icon' => $this->icon,
            'description' => $this->description,
            'category' => $this->category,
            'items' => $this->items ?? [],
            'proficiency' => $this->proficiency,
        ];
    }
}
