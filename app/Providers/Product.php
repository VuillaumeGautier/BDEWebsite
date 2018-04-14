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
 ***          This is the code of the Product table        ***
 ***                                                       ***
 *************************************************************
 *************************************************************/

namespace App\Providers;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $primaryKey = 'id_products';
    public $timestamps = false;

    function orders(){

        return $this->belongsToMany('App\Providers\Order','contains','id_products','id_orders');

    }


}