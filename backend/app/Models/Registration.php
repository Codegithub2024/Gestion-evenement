<?php

namespace App\Models;

use App\Traits\SerializeIso8601;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use SerializeIso8601;
    protected $fillable = [
        'event_id',
        'first_name',
        'last_name',
        'email',
    ];
}
