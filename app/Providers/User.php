<?php
/**
 * Created by PhpStorm.
 * User: Nicolas local
 * Date: 09/04/2018
 * Time: 15:38
 */

namespace App\Providers;


use Illuminate\Database\Eloquent\Model;
use App\Providers\Event;
use App\Providers\Comment;
use App\Providers\Photo;
use App\Providers\Order;



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

        return $this->belongsToMany('App\Providers\Photo','likes','id_users','id_photos');

    }

    function createEvents(){

        return $this->hasMany('App\Providers\Event','id_events','id_users');

    }

    function participateEvent(){

        return $this->belongsToMany('App\Providers\Event','participate','id_users','id_events');

    }

    function propose(){

        return $this->belongsTo('App\Providers\ProposedEvent','id_proposed_events','id_users');

    }

    function vote(){

        return $this->belongsToMany('App\Providers\ProposedEvent','vote','id_users','id_proposed_events');

    }

    function orders(){

        return $this->hasMany('App\Providers\Order','id_orders','id_users');

    }


}