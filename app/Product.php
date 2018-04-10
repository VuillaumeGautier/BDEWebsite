<?php
/**
 * Created by PhpStorm.
 * User: Nicolas local
 * Date: 09/04/2018
 * Time: 16:00
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $primaryKey = 'id_products';

    function orders(){

        return $this->belongsToMany('App\Providers\Order','App\Providers\Contain','id_products','id_orders');

    }


}