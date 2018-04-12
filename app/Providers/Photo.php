<?php
/**
 * Created by PhpStorm.
 * User: Nicolas local
 * Date: 09/04/2018
 * Time: 15:59
 */

namespace App\Providers;


use Illuminate\Database\Eloquent\Model;
use App\Providers\User;


class Photo extends Model
{

    protected $primaryKey = 'id_photos';
    public $timestamps = false;
    function comments()
    {

        return $this->hasMany('App\Providers\Comment','id_comments','id_photos');

    }

    function events(){

        return $this->belongsTo('App\Providers\Event','id_events','id_photos');


    }

    function users(){

        return $this->belongsTo('App\Providers\User','id_users','id_photos');

    }

    function isLike(){


        return $this->belongsToMany('App\Providers\User','likes','id_photos','id_users');

    }


}