<?php
/**
 * Created by PhpStorm.
 * User: vitor
 * Date: 05/09/18
 * Time: 19:08
 */

namespace App\Helpers;

class ValueHelper
{
    public static function toBrValue($value)
    {
        return number_format($value, 2, ',', '.');
    }

    public static function toDbValue($value)
    {
        return str_replace(',', '.', str_replace('.', '', $value));
    }
}