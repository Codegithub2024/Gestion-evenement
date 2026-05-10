<?php

namespace App\Models;

use App\Traits\SerializeIso8601;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use SerializeIso8601;

    protected $fillable = [
        'title',
        'description',
        'date',
        'location',
        'capacity',
        'updated_at'
    ];

    protected function casts(): array
    {
        return [
            'date' => 'datetime', // Force Laravel à traiter ce champ comme une date Carbon
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
