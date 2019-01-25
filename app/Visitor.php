<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    // Mass assigned
    protected $fillable = ['ip', 'browser', 'remember_token'];

    //
    public static  function getStatistic()
    {
        return Visitor::groupBy('browser')->selectRaw('count(*) as total, browser')->get();
    }

    public static  function getIP()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
}
