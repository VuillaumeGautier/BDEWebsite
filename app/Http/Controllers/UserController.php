<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 09/04/2018
 * Time: 22:16
 */

namespace App\Http\Controllers;








class UserController
{


    function  inscriptionIndex() {

    return view('inscription');



    }

    function inscription(){

       echo $_POST['name'];
       echo $_POST['fname'];
       echo $_POST['email'];
       echo $_POST['password'];


    }






};



