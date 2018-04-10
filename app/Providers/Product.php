<?php
/**
 * Created by PhpStorm.
 * User: Nicolas local
 * Date: 09/04/2018
 * Time: 16:00
 */

namespace App\Providers;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $primaryKey = 'id_products';

    function orders(){

        return $this->belongsToMany('App\Providers\Order','contains','id_products','id_orders');

    }


}