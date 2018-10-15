<?php
/**
 * Created by PhpStorm.
 * User: vitor
 * Date: 05/09/18
 * Time: 19:08
 */

namespace App\Helpers;

use App\Models\User;

class AuthorizationHelper
{
    public static function isAdmin($userId)
    {
        $user = User::where('id', $userId)->with('category')->first();
        return isset($user) and $user->category->id == 1;
    }

    public static function isUser($userId)
    {
        $user = User::where('id', $userId)->with('category')->first();
        return isset($user) and ($user->category->id == 2);
    }
}