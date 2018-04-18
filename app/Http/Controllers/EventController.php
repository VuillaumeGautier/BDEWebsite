<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 10/04/2018
 * Time: 09:28
 */

namespace App\Http\Controllers;
use App\Like;
use App\Providers\Event;
use App\Providers\Participate;
use App\Providers\User;
use Illuminate\Support\Facades\Session;

class EventController extends Controller

{
    public function incoming()
    {
        $events = Event::orderby('event_date')->get();

        $user_events = Participate::where('id_users',Session::get('user_id'))->get();

        foreach ($events as $event) {
            $event_date = $event->event_date;

            $event->participate=false;

            foreach ($user_events as $user_event){
                if($user_event->id_events == $event->id_events){
                    $event->participate=true;
                }
            }

            if(strtotime($event_date)>time()){
                $incoming_event[]=$event;
            }
        }

        //return view('home');
        return view('events', array('events' => $incoming_event));
    }

    public function past()
    {
        $events = Event::orderby('event_date')->get();

        $user_events = Participate::where('id_users',Session::get('user_id'))->get();

        foreach ($events as $event) {
            $event_date = $event->event_date;

            $event->participate = false;

            foreach ($user_events as $user_event) {
                if ($user_event->id_events == $event->id_events) {
                    $event->participate = true;
                }
            }

            foreach ($events as $event) {
                $event_date = $event->event_date;
                if (strtotime($event_date) < time()) {
                    $past_event[] = $event;
                }

            }

            return view('PastEvents', array('events' => $past_event));
        }
    }
}