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
 ***       This is the code of the Participate table       ***
 ***                                                       ***
 *************************************************************
 *************************************************************/

namespace App\Providers;


use Illuminate\Database\Eloquent\Model;

class Participate extends Model
{
    protected $fillable = array('id_events', 'id_users');
    protected $primaryKey = 'id_participate';
    protected $table = 'participate';
    public $timestamps = false;
}