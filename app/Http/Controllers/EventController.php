<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 10/04/2018
 * Time: 09:28
 */

namespace App\Http\Controllers;
use App\Providers\Event;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller

{
    public function index()
    {

        $events = Event::all();
        $user = Auth::user();

        foreach ($events as $event) {
            echo $event->id_events;
        }

        return view('events', array('events' => $events))->with("user", $user);

    }
}