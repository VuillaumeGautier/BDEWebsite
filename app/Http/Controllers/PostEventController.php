<?php
namespace App\Http\Controllers;

class postEventController extends Controller
{
    public function get(){
        return view('postEvent');
    }
    public function post(){
        $event = new Event;
        $event->event_title = $_POST['titre'];
        $event->event_date = $_POST['date'];
        $event->event_text = $_POST['description'];
        //$imageUploaded = $_POST['image'];
        $event->event_status = 1;
        if ($_FILES['image']['error'] > 0) $erreur = "Erreur lors du transfert";
        $extensions_valides = array( 'jpg' , 'jpeg' , 'png' );
        $extension_upload = strtolower(  substr(  strrchr($_FILES['image']['name'], '.')  ,1)  );
        if ( in_array($extension_upload,$extensions_valides) ){
            $nom = md5(uniqid(rand(), true));
            $chemin= "Pictures/events/{$nom}.{$extension_upload}";
            move_uploaded_file($_FILES['image']['tmp_name'],$chemin);
            $event->event_picture_url = $chemin;
        }
        $event->save();

        return view('postAccepted')->with('event', $event);
    }
}