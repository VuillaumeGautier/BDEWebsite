<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
class likeController extends Controller
{
    public function post(){
        if(isset($_POST['id_picture']) && isset($_POST['id_user'])){
            Like::create(['id_user' => $_POST['id_user'], 'id_picture' =>  $_POST['id_picture']]);
            $pictures = DB::table('pictures')->where('id_event', '=',  $_POST['id_picture'])->get();
            $pictures = json_decode($pictures, true);
            $n = $_POST['id_event'];
            $url = "/eventPicture".$n;
            echo $url;
            return redirect($url);


        }
    }
}