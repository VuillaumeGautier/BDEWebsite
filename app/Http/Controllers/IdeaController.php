<?php
namespace App\Http\Controllers;
use App\Providers\Like;
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
    if (empty($_SESSION['user_id'])){
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

        $idees = ProposedEvent::all();
        return view('ListIdeaBox', [
            'idees' => $idees,
        ]);
    }

}

?>