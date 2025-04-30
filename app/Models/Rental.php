<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $fillable=[
        'uid',
        'office_id',
        'startDate',
        'endDate',
        'dailyRate',
        'baseFree'
    ];
}
