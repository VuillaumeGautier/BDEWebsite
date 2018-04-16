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
    public function picture()
    {
        return $this->belongsTo(picture::class);
    }
    public function user_bde()
    {
        return $this->belongsToMany(user_bde::class,'id_event');
    }
    public function register(){
        return $this->belongsTo(register::class);
    }
}