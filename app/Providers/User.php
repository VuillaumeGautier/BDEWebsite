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
 ***          This is the code of the User table           ***
 ***                                                       ***
 ***          It's use eloquent for the connexion          ***
 ***                                                       ***
 *************************************************************
 *************************************************************/

namespace App\Providers;


use Illuminate\Database\Eloquent\Model;
use App\Providers\Event;
use App\Providers\Comment;
use App\Providers\Photo;
use App\Providers\Order;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;



class User extends Model implements Authenticatable
{

    protected $primaryKey = 'id_users';
    public $timestamps = false;
    protected $fillable = ['name','fname', 'email', 'password','rights'];
    protected $hidden = ['password', 'remember_token'];

    function comments()
    {

        return $this->hasMany('App\Providers\Comment','id_comments','id_users');

    }
    function postPhotos(){

        return $this->hasMany('App\Providers\Photo','id_photos','id_users');


    }

    function likePhotos(){

        return $this->belongsToMany('App\Providers\Photo','likes','id_users','id_photos');

    }

    function createEvents(){

        return $this->hasMany('App\Providers\Event','id_events','id_users');

    }

    function participateEvent(){

        return $this->belongsToMany('App\Providers\Event','participate','id_users','id_events');

    }

    function propose(){

        return $this->belongsTo('App\Providers\ProposedEvent','id_proposed_events','id_users');

    }

    function vote(){

        return $this->belongsToMany('App\Providers\ProposedEvent','vote','id_users','id_proposed_events');

    }

    function orders(){

        return $this->hasMany('App\Providers\Order','id_orders','id_users');

    }


    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        // TODO: Implement getAuthIdentifierName() method.
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        // TODO: Implement getAuthIdentifier() method.
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        // TODO: Implement getAuthPassword() method.
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        // TODO: Implement getRememberToken() method.
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string $value
     * @return void
     */
    public function setRememberToken($value)
    {
        // TODO: Implement setRememberToken() method.
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        // TODO: Implement getRememberTokenName() method.
    }
}