<?php
/*************************************************************
 *************************************************************
 ***                                                       ***
 ***                 Code by Nicolas JEROME                ***
 ***               nicolas.jerome1@viacesi.fr              ***
 ***                                                       ***
 *************************************************************
 *************************************************************
 */

namespace App\Http\Controllers;

use App\Providers\Contain;
use App\Providers\Event;
use App\Providers\Product;
use App\Providers\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class UserController
{


    /**
     *************************************************************
     *************************************************************
     ***                                                       ***
     *** This function return the Sign-up web page via a route ***
     ***                                                       ***
     *************************************************************
     *************************************************************/


    function inscriptionIndex()
    {


        return view('SignIn');


        /**
         **********************************************************************
         **********************************************************************
         ***                                                                ***
         *** This function create a new user in the DB after an inscription ***
         ***                                                                ***
         **********************************************************************
         **********************************************************************/

    }

    function inscription()
    {


        $user = User::create([

            'name' => $_POST['name'],
            'fname' => $_POST['fname'],
            'mail' => $_POST['email'],
            'password' => $_POST['password']

        ]);

        $user->save();

        return view('mail');

    }

    /**
     *************************************************************
     *************************************************************
     ***                                                       ***
     *** This function return the Sign-in web page via a route ***
     ***                                                       ***
     *************************************************************
     *************************************************************/

    function loginIndex()
    {


        return view('SignUp');


    }


    /**
     *************************************************************
     *************************************************************
     ***                                                       ***
     ***   This function create a session after a user login   ***
     ***                                                       ***
     *************************************************************
     *************************************************************/

    function login()
    {

        $user = User::where(
            'mail', '=', $_POST['email']
        )->first();

        if ($user == null){

            return view('SignUp');



        }

        if ($_POST['password'] == $user->pwd) {

            Session::put('user_id', $user->id_users);

            return view('home');

        } else {
            return view('SignUp');

        }

    }

    /**
     *************************************************************
     *************************************************************
     ***                                                       ***
     ***    This function end a session after a user logout    ***
     ***                                                       ***
     *************************************************************
     *************************************************************/

    function logout()
    {


        Session::put('user_id', null);
        return view('home');

    }



    function admin()
    {


        if (Session::get('user_id') != 1)
        {


            if (empty(Session::get('user_id')))
            {

                return view('SignUp');


            }




            return view('SignUp');


        }

        else {
            return view('admin');
        }
    }

    function showOrderTable(){

        $htmlresponse =   "<div class='container' id='container-table'>". "<div class='table-responsive'>"
            ."<table class='table'><thead><tr><th>Order</th><th>Name</th>
<th>First Name</th></tr></thead><tbody>";


        $order =\App\Providers\Order::all();


        foreach ($order as $orders)
        {
            $user =\App\Providers\User::all();

            $name = 0;
            $fname = 0;

                foreach ($user as $users)
                {
                    if ($orders->id_users == $users->id_users)
                    {
                        $name = $users->name;
                        $fname = $users->fname;


                    }


                }



                $htmlresponse = $htmlresponse . "<tr>" .
                    "<th>" . $orders->id_orders . "</th>" .
                    "<th>" . $name . "</th>" .
                   "<th>" . $fname . "</th>" .
                    "</tr>";



        }

        $htmlresponse = $htmlresponse."</tbody></table></div></div>";


        return response()->json($htmlresponse);

    }

    function showUserTable(){

        $htmlresponse =   "<div class='container' id='container-table'>"."<div class='table-responsive'>"
                    ."<table class='table'><thead><tr><th>Firstname</th><th>Lastname</th>
<th>Mail</th><th>Right</th></tr></thead><tbody>";


        $user = \App\Providers\User::all();



        foreach ($user as $value)
        {
            $htmlresponse = $htmlresponse."<tr>".
                "<th>".$value->fname."</th>".
                "<th>".$value->name."</th>".
                "<th>".$value->mail."</th>".
                "<th>".$value->rights."</th>"  .
                "</tr>" ;


        }

        $htmlresponse = $htmlresponse."</tbody></table></div></div>";


        return response()->json($htmlresponse);

    }


    function changeRight(){

        $user = User::where(
            'mail', '=',$_POST['email']
        )->first();


        $user->rights = $_POST['right'];

        $user->save();

        return redirect()->action('UserController@admin');

    }


    function home()
    {


        $products = Product::all();

        foreach ($products as $key => $product) {

            $contains = Contain::where('id_products',$product->id_products)->get();

            $quantity = 0;

            foreach ($contains as $contain){
                $quantity += $contain->Quantity;
            }

            $prods[$product->id_products] = $quantity;
        }

        arsort($prods);
        $sorted = array_keys($prods);
        $sells[0] = Product::find($sorted[0]);
        $sells[1] = Product::find($sorted[1]);
        $sells[2] = Product::find($sorted[2]);

        $events = Event::all();

        foreach ($events as $event) {
            $event_date = $event->event_date;

            $event->participate=false;

            if(strtotime($event_date)>time()){
                $incoming_event[$event->id_events]=strtotime($event_date);
            }
        }

        arsort($incoming_event);
        $sorted = array_keys($incoming_event);
        $inc[0] = Event::find($sorted[0]);
        $inc[1] = Event::find($sorted[1]);
        $inc[2] = Event::find($sorted[2]);

        foreach ($events as $event) {
            $event_date = $event->event_date;

            $event->participate=false;

            if(strtotime($event_date)<time()){
                $passed[$event->id_events]=strtotime($event_date);
            }
        }

        arsort($passed);
        $sorted = array_keys($passed);
        $past[0] = Event::find($sorted[0]);
        $past[1] = Event::find($sorted[1]);
        $past[2] = Event::find($sorted[2]);

        return view('home', ['past' => $past, 'inc' => $inc, 'sells' => $sells]);

    }



}



