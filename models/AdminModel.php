<?php


namespace Models;


class AdminModel
{
    protected static $admin_name = 'admin';
    protected static $password_hash = '202cb962ac59075b964b07152d234b70';

    public static function checkUser($user_name, $password)
    {
        return ($user_name==self::$admin_name) && (self::$password_hash == md5($password));
    }
}