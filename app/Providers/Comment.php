<?php
/**
 * Created by PhpStorm.
 * User: Nicolas local
 * Date: 09/04/2018
 * Time: 15:45
 */

namespace App\Providers;



use Illuminate\Database\Eloquent\Model;
use App\Providers\User;
use App\Providers\Photo;

class Comment extends Model
{


    protected $primaryKey = 'id_comments';
    protected $table = 'comments';
    public $timestamps = false;

    public function photos()
    {
        return $this->belongsTo('App\Providers\Photo','id_photos','id_comments');
    }

    public function users()
    {
        return $this->belongsTo('App\Providers\User','id_users','id_users');
    }


}