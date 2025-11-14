<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    protected $fillable = [
        'title',
        'lead_text',
        'description',
        'image',
        'highlights',
    ];

    protected $casts = [
        'highlights' => 'array',
    ];

    public function toViewArray()
    {
        return [
            'title' => $this->title,
            'lead_text' => $this->lead_text,
            'description' => $this->description,
            'image' => $this->image,
            'highlights' => $this->highlights ?? [],
        ];
    }
}
