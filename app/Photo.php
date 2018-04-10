<?php
/**
 * Created by PhpStorm.
 * User: Nicolas local
 * Date: 09/04/2018
 * Time: 15:59
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    protected $primaryKey = 'id_photos';

    function comments()
    {

        return $this->hasMany('App\Comment');

    }

    function events(){

        return $this->belongsTo('App\Event');


    }

    function users(){

        return $this->belongsTo('App\User');

    }

    function isLike(){


        return $this->belongsToMany('App\Users','App\Like','id_photos','id_users');

    }

}