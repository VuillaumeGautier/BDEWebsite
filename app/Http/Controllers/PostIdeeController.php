<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
class postIdeeController extends Controller
{
    public function get(){
        $user = Auth::user();
        return view('postIdee', ['user' => $user]);
    }

    public function post(){
        $idee = new \App\idee;
        $idee->idea_name = $_POST['titre'];
        $idee->idea_text = $_POST['description'];
        $idee->id_user = $_POST['user_id'];
        //$imageUploaded = $_POST['image'];
        $extensions_valides = array( 'jpg' , 'jpeg' , 'png' );
        $extension_upload = strtolower(  substr(  strrchr($_FILES['image']['name'], '.')  ,1)  );
        if ( in_array($extension_upload,$extensions_valides) ){
            $nom = md5(uniqid(rand(), true));
            $chemin= "assets/img/events/{$nom}.{$extension_upload}";
            move_uploaded_file($_FILES['image']['tmp_name'],$chemin);
            // if ($resultat) echo "Transfert réussi";
            $idee->idea_picture = $chemin;
        }
        $idee->save();
        $user = Auth::user();
        return view('ideaAccepted')->with('idea', $idee)->with("user", $user);
    }
}