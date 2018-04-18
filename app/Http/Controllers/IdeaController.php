<?php
namespace App\Http\Controllers;
use App\Providers\Like;
use App\Providers\Vote;
use Illuminate\Support\Facades\DB;
use App\Providers\Comment;
use App\Providers\Photo;
use App\Providers\Contain;
use App\Providers\User;
use App\Providers\Event;
use Illuminate\Http\Request;
use App\Providers\ProposedEvent;
use Illuminate\Support\Facades\Session;

class IdeaController extends Controller{

    function propose()
{
    if (empty(Session::get('user_id'))){
        return redirect('/SignUp');
    }

    $idee = new ProposedEvent;
    $idee->name = request('Nom');
    $idee->proposed_date = request('Date');
    $idee->thumbnail = 1;
    $idee->id_users = 3;
    $idee->description = request('Description');

    $idee->save();

    if ($idee) {

        return redirect('/proposedevent');
    }
}

    function report()
    {

    }

    function affichage()
    {
        if (empty(Session::get('user_id'))){
            return redirect('/SignIn');
        }

        $ideas = ProposedEvent::all();

        foreach ($ideas as $key => $idea){
            $voted = false;
            $vote = Vote::where('id_users',Session::get('user_id'))->where('id_proposed_events',$idea->id_proposed_events)->get();

            $exists = 0;

            foreach ($vote as $count){
                $exists ++;
            }

            if($exists == 1 ){
                $voted = true;
            }
            $idea['voted'] = $voted;
            $ideas[$key] = $idea;
        }


        return view('ListIdeaBox', [
            'ideas' => $ideas,
        ]);
    }

    function vote(){

        if (empty(Session::get('user_id'))){
            return redirect('/SignIn');
        }

        $id_events = $_POST['id'];
        $id_users = Session::get('user_id');

        $vote = new Vote();
        $vote->id_proposed_events = $id_events;
        $vote->id_users = $id_users;
        $vote->save();

        return redirect('/proposedevent');
    }

}

?>