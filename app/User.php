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

        return $this->hasMany('App\Providers\Comment','id_comments','id_users');

    }
    function postPhotos(){

        return $this->hasMany('App\Providers\Photo','id_photos','id_users');


    }

    function likePhotos(){

        return $this->belongsToMany('App\Providers\Photo','App\Providers\Like','id_users','id_photos');

    }

    function createEvents(){

        return $this->hasMany('App\Providers\Event','id_events','id_users');

    }

    function participateEvent(){

        return $this->belongsToMany('App\Providers\Event','App\Providers\Participate','id_users','id_events');

    }

    function propose(){

        return $this->belongsTo('App\Providers\ProposedEvent','id_proposed_events','id_users');

    }

    function vote(){

        return $this->belongsToMany('App\Providers\ProposedEvent','App\Providers\Vote','id_users','id_proposed_events');

    }

    function orders(){

        return $this->hasMany('App\Providers\Order','id_orders','id_users');

    }


}