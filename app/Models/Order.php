<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name',
        'quantity',
        'price',
        'status',
        'table_number'
    ];

    public function table()
    {
        return $this->belongsTo(Table::class);
    }
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
