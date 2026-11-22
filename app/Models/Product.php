<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Sale;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'stock_quantity',
        'image',
        'is_archived',
    ];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
