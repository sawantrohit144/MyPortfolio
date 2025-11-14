<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    protected $fillable = [
        'available',
        'badge_text',
        'headline',
        'highlighted_name',
        'typed_texts',
        'primary_button_text',
        'primary_button_link',
        'primary_button_icon',
        'secondary_button_text',
        'secondary_button_link',
        'secondary_button_icon',
        'scroll_text',
    ];

    protected $casts = [
        'available' => 'boolean',
        'typed_texts' => 'array',
    ];

    public function toViewArray()
    {
        return [
            'available' => $this->available,
            'availability_text' => $this->badge_text,
            'name' => $this->highlighted_name,
            'typed_texts' => $this->typed_texts ?? [],
            'primary_button' => [
                'text' => $this->primary_button_text,
                'icon' => $this->primary_button_icon,
                'link' => $this->primary_button_link,
            ],
            'secondary_button' => [
                'text' => $this->secondary_button_text,
                'icon' => $this->secondary_button_icon,
                'link' => $this->secondary_button_link,
            ],
            'scroll_text' => $this->scroll_text,
        ];
    }
}
