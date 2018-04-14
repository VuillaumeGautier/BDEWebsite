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
 ***      This is the code of the proposed event table     ***
 ***                                                       ***
 *************************************************************
 *************************************************************/

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;

class ProposedEvent extends Model
{
    protected $table = 'proposed_events';
    protected $primaryKey = 'id_proposed_events';
    public $timestamps = false;

    function isProposed(){

        return $this->belongsTo('App\Providers\User','id_users','proposed_events');

    }

    function isVoted(){

        return $this->belongsToMany('App\Providers\User','App\Providers\Vote','id_proposed_events','id_users');

    }

}