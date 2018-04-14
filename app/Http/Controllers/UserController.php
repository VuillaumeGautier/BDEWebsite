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



    function  inscriptionIndex() {



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

    function inscription(){


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

    function loginIndex(){


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

    function login(){

        $user = User::where(
            'mail','=',$_POST['email']
        )->first();


    if($_POST['password'] = $user->pwd) {

        Session::put('user_id',$user->id_users);

        return view('home');

    }

    else{
        echo "gfgfsfdsffssfd";
        return view('SignUp');

    }

    }



};



