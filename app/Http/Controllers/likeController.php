<?php
namespace App\Http\Controllers;
use App\Providers\Participate;
use App\Providers\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class likeController extends Controller
{
    /*
     * This function sing up an user in an event
     */

    public function sign()
    {
        if (empty(Session::get('user_id'))) {
            return redirect('/SignIn');
        }

        $id_event = $_POST['id'];

        $id_users = Session::get('user_id');
        $users = User::find($id_users);

        $users->participateEvent()->attach($id_event);

        return redirect('/incoming');
    }

    public function download($ev)
    {
        $inscriptions = Participate::where('id_events', $ev)->get();
        $utilisateurs = User::all();
        foreach ($utilisateurs as $utilisateur) {
            foreach ($inscriptions as $inscription) {
                if ($utilisateur->id == $inscription->id) {
                    $listes[] = array("{$utilisateur -> id_users}");
                }
            }
        }

        $fichier = 'inscrit' . $ev . '.csv';
        $delimiteur = ';';
        $fichier_csv = fopen($fichier, 'w+');
        foreach ($listes as $liste) {
            fputcsv($fichier_csv, $liste, $delimiteur);

        }

    }
}