<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CancelledOrder extends Model
{
    protected $fillable = [
        'name',
        'quantity',
        'price',
        'table_number'
    ];
}
