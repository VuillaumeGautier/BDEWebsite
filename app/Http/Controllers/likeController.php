<?php
namespace App\Http\Controllers;
use App\Providers\Participate;
use App\Providers\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class likeController extends Controller
{
    public function sign()
    {
        if (empty(Session::get('user_id'))){
            return redirect('/SignIn');
        }

        $id_events = $_POST['id'];

        $id_users = Session::get('user_id');
        $users = User::find($id_users);

        $users->participateEvent()->attach($id_events);

        return redirect('/incoming');
    }

        public function export(){
            $list = array ($id_events, $id_users);
            $fp = fopen("export.csv", "w");
            foreach($list as $fields):
             fputcsv($fp, $fields);
             endforeach;
            fclose($fp);
            }
}