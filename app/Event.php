<?php
/**
 * Created by PhpStorm.
 * User: Nicolas local
 * Date: 09/04/2018
 * Time: 15:56
 */

namespace App\Providers;


use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $primaryKey = 'id_events';

    function photos(){

        return $this->hasMany('App\Photo');


    }

    function isCreate(){

        return $this->belongsTo('App\User');

    }

    function hasUsers(){

        return $this->belongsToMany('App\User','App\Participate','id_events','id_users');

    }

}