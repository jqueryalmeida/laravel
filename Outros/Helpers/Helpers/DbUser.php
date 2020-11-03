<?php
// Para Laravel 8. Para outras versões requer ajustes.
namespace App\Helpers;

class Db{
    $user = App\Models\User();
    public static function userAdd($name, $email, $pass){
        $user->name = $name;
        $user->email = $email;
        $user->password = $pass;
        $user->save();
    }
}
