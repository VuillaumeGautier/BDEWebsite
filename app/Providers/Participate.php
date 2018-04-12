<?php
/**
 * Created by PhpStorm.
 * User: Nicolas local
 * Date: 10/04/2018
 * Time: 09:26
 */

namespace App\Providers;


use Illuminate\Database\Eloquent\Model;

class Participate extends Model
{

    protected $primaryKey = 'id_participate';
    protected $table = 'participate';
    public $timestamps = false;
}