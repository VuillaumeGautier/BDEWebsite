<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 09/04/2018
 * Time: 22:16
 */

namespace App\Http\Controllers;

use App\Providers\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class UserController
{


    function  inscriptionIndex() {

    return view('SignIn');



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

    function loginIndex(){


        return view('SignUp');



    }

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



