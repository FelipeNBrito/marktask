<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sale extends Model
{
    protected $table = 'sales';
    protected $primaryKey = 'id';
    protected $fillable = [
        'code',
        'users_id'
    ];

    public function salesProducts()
    {
        return $this->hasMany(SaleProduct::class, 'sales_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    //Generate code sale
    public static function generteCodeSale()
    {
        $alphaNumeric = "0123456789ABCDEFGHIJKLMNOPQRSTUVXZ";

        $code = "";

        for ($i = 0; $i < 8; $i++) {
            $rand = rand(0, (strlen($alphaNumeric) - 1));
            $code .= $alphaNumeric[$rand];
        }

        //If the sale code exist, generate the new
        if (Sale::where('code', $code)->exists()) {
            $code = self::generteCodeSale();
        }

        return $code;
    }

    //Return sale principal informations by products
    public static function getSaleByProducts($saleId)
    {
        if ($saleId > 0) {
            $sql = "SELECT PROD.name,
                    PRODT.description as producttype,
                    COUNT(SALPROD.products_id) as amount,
                    SALPROD.value,
                    SALPROD.tax
                FROM products PROD
                    INNER JOIN product_types PRODT ON PRODT.id = PROD.product_types_id
                    INNER JOIN sales_has_products SALPROD ON SALPROD.products_id = PROD.id
                WHERE SALPROD.sales_id = {$saleId}
                GROUP BY SALPROD.products_id, PROD.name, productType, SALPROD.value, SALPROD.tax";

            $sale = DB::select(DB::raw($sql));

            return $sale;
        }

        return false;
    }

}
