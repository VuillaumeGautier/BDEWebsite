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
 ***          This is the code of the Order table          ***
 ***                                                       ***
 *************************************************************
 *************************************************************/

namespace App\Providers;


use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $primaryKey = 'id_orders';
    public $timestamps = false;

    function products(){


        return $this->belongsToMany('App\Providers\Product','contains','id_orders','id_products');


    }

    function users(){

        return $this->belongsTo('App\Providers\User','id_users','id_orders');



    }

}