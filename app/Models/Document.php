<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
        'employee_id',
        'phone',
        'time',
        'remark',
        'place',
        'departure_branch',
        'arrival_latitude',
        'arrival_longitude'
        // 'location_latitude',
        // 'location_longitude',
        // 'departure_latitude',
        // 'departure_longitude',
        // 'arrival_latitude',
        // 'arrival_longitude',
    ];

}
