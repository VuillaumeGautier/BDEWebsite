<?php
/**
 * Created by PhpStorm.
 * User: Nicolas local
 * Date: 16/04/2018
 * Time: 16:00
 */

namespace App\Http\Controllers;


use App\Providers\User;

class ApiController extends Controller
{


    function usersLogs(){

        $data = User::all();




    return response()->json($data);

    }


}