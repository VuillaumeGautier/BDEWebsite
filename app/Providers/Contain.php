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
 ***          This is the code of the Contain table        ***
 ***                                                       ***
 *************************************************************
 *************************************************************/

namespace App\Providers;


use Illuminate\Database\Eloquent\Model;

class Contain extends Model
{

    protected $primaryKey = 'id_contains';
    public $timestamps = false;
}