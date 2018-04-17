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

        return view('admin');

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


    function changeRight($mail, $right){

        $user = User::where(
            'mail', '=',$mail
        )->first();


        $user->rights = $right;


    }


}



