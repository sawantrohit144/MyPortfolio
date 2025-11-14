<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'years',
        'role',
        'company',
        'description',
        'tags',
    ];

    protected $casts = [
        'tags' => 'array',
    ];

    public function toViewArray()
    {
        return [
            'years' => $this->years,
            'role' => $this->role,
            'company' => $this->company,
            'description' => $this->description,
            'tags' => $this->tags ?? [],
        ];
    }
}
