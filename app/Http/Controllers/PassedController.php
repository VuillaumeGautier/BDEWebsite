<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 09/04/2018
 * Time: 22:14
 */

namespace App\Http\Controllers;

use App\Providers\Comment;
use App\Providers\Event;
use App\Providers\Photo;
use Illuminate\Http\Request;

class PassedController extends Controller
{
    public function getEvent($id)
    {

        $event = Event::find($id);

        $photos = Photo::where('id_events',$id)->get();

        foreach ($photos as $key => $photo){


            $photos[$key]['comments'] = Comment::where('id_photos',$photo->id_photos)->get();
        }



        return view('PastEvent', ['event' => $event, 'photos' => $photos]);
    }
}