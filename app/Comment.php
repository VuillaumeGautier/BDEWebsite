<?php
/**
 * Created by PhpStorm.
 * User: Nicolas local
 * Date: 09/04/2018
 * Time: 15:45
 */

namespace App\Providers;



use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $primaryKey = 'id_comments';

    public function photos()
    {
        return $this->belongsTo('App\Providers\Photo','id_photos','id_comments');
    }

    public function users()
    {
        return $this->belongsTo('App\Providers\User','id_users','id_users');
    }


}