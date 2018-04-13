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

class IdeaController extends Controller{

    function propose()
{
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

    function affichage()
    {
        $idees = ProposedEvent::all();
        return view('ListIdeaBox', [
            'idees' => $idees,
        ]);
    }

}

?>