<?php
/**
 * Created by PhpStorm.
 * User: Nicolas local
 * Date: 09/04/2018
 * Time: 16:02
 */

namespace App\Providers;


use Illuminate\Database\Eloquent\Model;

class ProposedEvent extends Model
{
    protected $table = 'proposed_events';
    protected $primaryKey = 'id_proposed_events';


}