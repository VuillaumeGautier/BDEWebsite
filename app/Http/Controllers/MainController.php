<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 09/04/2018
 * Time: 22:15
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function boutique()
    {
        $products = Products::all();
        return view('boutique',['products' => $products]);
    }
}