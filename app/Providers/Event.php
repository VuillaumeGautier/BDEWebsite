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
 ***          This is the code of the Event table          ***
 ***                                                       ***
 *************************************************************
 *************************************************************/

namespace App\Providers;


use Illuminate\Database\Eloquent\Model;
use App\Providers\User;

class Event extends Model
{
    protected $fillable = array('event_title', 'event_price','event_date','event_text','event_picture_url','event_status');

    public function users()
    {
        return $this->belongsToMany('App\Providers\User','participate','id_events','id_users');
    }
}