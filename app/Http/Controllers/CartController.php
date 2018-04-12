<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 09/04/2018
 * Time: 22:17
 */

namespace App\Http\Controllers;

use App\Providers\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {

    }

    public function getBoutique(){

        return view('shop');
    }

    public function sortedProducts() {



        $htmlAnswer = '<div class = "container" id="products">';

        if($_GET["type"] =! "none") {
            $products = Product::all()->where("type","=",$_POST["type"]);
        }
        else{
            $products = Product::all();
        }

        foreach ($products as $product){
            $htmlAnswer = $htmlAnswer."<div class='col-sm-12 col-md-6 col-lg-4 product'><div class='prod-info'> <img src='../Pictures/products/mini_$product->photo' class='prod-photo' alt='Product photo' >"
            ."<div class='prod-name'>$product->name</div><div class='prod-price'>$product->price</div></div></div>";
        }

        $htmlAnswer = $htmlAnswer."</div>";
        return response()->json($htmlAnswer);
        //json(['html' => $htmlAnswer]);
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