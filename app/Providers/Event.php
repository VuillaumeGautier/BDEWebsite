<?php
/*************************************************************
 *************************************************************
 ***                                                       ***
 ***                 Code by Nicolas JEROME                ***
 ***               nicolas.jerome1@viacesi.fr              ***
 ***                                                       ***
 *************************************************************
 *************************************************************
 ***                                                       ***
 ***          This is the code of the Event table          ***
 ***                                                       ***
 *************************************************************
 *************************************************************/

namespace App\Providers;


use Illuminate\Database\Eloquent\Model;
use App\Providers\User;

class Event extends Model
{

    protected $primaryKey = 'id_events';
    protected $table = 'events';
    public $timestamps = false;

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