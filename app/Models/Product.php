<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'value',
        'tax',
        'product_types_id',
    ];

    public function productType()
    {
        return  $this->belongsTo(ProductTypes::class, 'product_types_id', 'id');
    }
}
