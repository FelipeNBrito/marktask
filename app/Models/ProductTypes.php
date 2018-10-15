<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductTypes extends Model
{
    protected $table      = 'product_types';
    protected $primaryKey = 'id';
    protected $fillable   = [
        'description',
        'tax',
    ];
}
