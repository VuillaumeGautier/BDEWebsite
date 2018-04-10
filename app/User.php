<?php
/**
 * Created by PhpStorm.
 * User: Nicolas local
 * Date: 09/04/2018
 * Time: 15:38
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $primaryKey = 'id_users';

    function comments()
    {

        return $this->hasMany('App\Comment');

    }
    function postPhotos(){

        return $this->hasMany('App\Photo');


    }

    function likePhotos(){

        return $this->belongsToMany('App\Photo','App\Like','id_users','id_photos');

    }

    function createEvents(){

        return $this->hasMany('App\Event');

    }

    function participateEvent(){

        return $this->belongsToMany('App\Event','App\Participate','id_users','id_events');

    }

    function propose(){

        return $this->belongsTo('App\ProposedEvent');

    }

    function vote(){

        return $this->belongsToMany('App\ProposedEvent','App\Vote','id_users','id_proposed_events');

    }

    function orders(){

        return $this->hasMany('App\Order');

    }


}