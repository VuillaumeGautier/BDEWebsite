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

        return $this->hasMany('App\Providers\Photo','id_photos','id_events');


    }

    function isCreate(){

        return $this->belongsTo('App\Providers\User','id_users','id_events');

    }

    function hasUsers(){

        return $this->belongsToMany('App\Providers\User','App\Providers\Participate','id_events','id_users');

    }

}