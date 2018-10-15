<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleProduct extends Model
{
    protected $table = 'sales_has_products';
    protected $primaryKey = 'id';
    protected $fillable = [
        'products_id',
        'sales_id',
        'value',
        'tax',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'products_id', 'id');
    }
}
