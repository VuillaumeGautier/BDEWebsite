<?php
/**
 * Created by PhpStorm.
 * User: Nicolas local
 * Date: 10/04/2018
 * Time: 09:28
 */

namespace App\Providers;


use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $primaryKey = 'id_orders';

    function products(){


        return $this->belongsToMany('App\Providers\Product','contains','id_orders','id_products');


    }

    function users(){

        return $this->belongsTo('App\Providers\User','id_users','id_orders');



    }

}