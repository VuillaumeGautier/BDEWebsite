<?php
/**
 * Created by PhpStorm.
 * User: Nicolas local
 * Date: 09/04/2018
 * Time: 15:56
 */

namespace App\Providers;


use Illuminate\Database\Eloquent\Model;
use App\Providers\User;

class Event extends Model
{

    protected $primaryKey = 'id_events';
    protected $table = 'events';

    function photos(){

        return $this->hasMany('App\Providers\Photo','id_photos','id_events');


    }

    function isCreate(){

        return $this->belongsTo('App\Providers\User','id_users','id_events');

    }

    function hasUsers(){

        return $this->belongsToMany('App\Providers\User','participate','id_events','id_users');

    }

}