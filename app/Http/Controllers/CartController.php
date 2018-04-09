<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 09/04/2018
 * Time: 22:17
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getBoutique(){
        $products = Product::all();
        return view('boutique',['products' => $products]);
    }

    public function add() {
        return view('createProduct');
    }
    public function create(Request $request){
    }

    public function addItem (Request $request, $id){
    }

    public function getCart(){
    }

    public function getReduceOne($id){
    }

    public function getAddOne($id){
    }
    public function getRemoveItem($id){
    }
}