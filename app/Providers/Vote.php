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
 ***          This is the code of the Vote table           ***
 ***                                                       ***
 *************************************************************
 *************************************************************/
namespace App\Providers;


use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{

    protected $primaryKey = 'id_votes';
    public $timestamps = false;


}