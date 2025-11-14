<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'lead',
        'methods',
    ];

    protected $casts = [
        'methods' => 'array',
    ];

    public function toViewArray()
    {
        return [
            'lead' => $this->lead,
            'methods' => $this->methods ?? [],
        ];
    }
}
