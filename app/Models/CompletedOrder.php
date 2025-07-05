<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompletedOrder extends Model
{
    protected $fillable = [
        'table_number',
        'price',
    ];
}
