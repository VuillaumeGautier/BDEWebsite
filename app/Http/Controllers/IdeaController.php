<?php
namespace App\Http\Controllers;


class IdeaController{

    function propose()
{
    $idee = new ProposedEvent;
    $idee->name = request('Nom');
    $idee->proposed_date = request('Date');
    $idee->thumbnail = 1;
    $idee->id_users = 3;
    $idee->description = request('Description');

    $idee->save();
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