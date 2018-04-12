<?php
/**
 * Created by PhpStorm.
 * User: Nicolas local
 * Date: 10/04/2018
 * Time: 09:22
 */

namespace App\Providers;


use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{

    protected $primaryKey = 'id_votes';
    public $timestamps = false;


}