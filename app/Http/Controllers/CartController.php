<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 09/04/2018
 * Time: 22:17
 */

namespace App\Http\Controllers;

use App\Providers\Order;
use App\Providers\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function __construct()
    {

    }

    public function getBoutique(){

        return view('shop');
    }

    /*
     * This function send all products as JSON if the get value is none, and send all products with the specified type only
     */

    public function sortedProducts() {



        $htmlAnswer = '<div class = "container" id="products">';

        //Check the type in the URL and take products

        if($_GET['max'] == ""){
            $max = 1000000 ;
        }else{
            $max = $_GET['max'];
        }

        if($_GET["type"] == "none") {
            $products = Product::where("price","<", $max)->get();
        }
        else{
            $products = Product::where("type",$_GET["type"])->where("price","<", $max)->get();
        }

        //Generate the html to fill the view

        foreach ($products as $product){
            $htmlAnswer = $htmlAnswer."<div class='col-sm-12 col-md-6 col-lg-3 col-xl-2 product'><a href='/shop/product/$product->id_products'> <div class='prod-info'> <img src='../Pictures/products/mini_$product->photo' class='prod-photo' alt='Product photo' >"
            ."<div class='prod-name'>$product->name</div><div class='prod-price'>$product->price</div></div></a></div>";
        }

        $htmlAnswer = $htmlAnswer."</div>";

        //Send the html string in JSON
        return response()->json($htmlAnswer);
    }

    public function getCart(){

        if (empty(Session::get('user_id'))){
            return redirect('/SignIn');
        }

        if (Session::get('user_id')== 2){
            $add = true ;
        }

        $total = 0;

        if(isset($_COOKIE["cart"])){
            $cart = unserialize($_COOKIE["cart"]);

            $items = array();

            foreach ($cart as $product => $number){
                $prod = Product::find($product);
                $item = ['name' => $prod->name, 'number' => $number, 'price' => $prod->price, 'id' => $prod->id_products];
                $items[] = $item;
                $total += $number*$prod->price;
            }

        }else{
            $items = [];
        }

        return view('cart', ['items' => $items, 'total' => $total, 'add' => $add]);

    }

    public function addItem (){

        if (empty(Session::get('user_id'))){
            return redirect('/SignIn');
        }

        $product = Product::find($_POST["product"]);

        $number = $_POST["number"];

        if(isset($_COOKIE["cart"])){
            $cart = unserialize($_COOKIE["cart"]);
            if(array_key_exists ($product->id_products,$cart)){
                $cart[$product->id_products] = $cart[$product->id_products] + $number;
            }else{
                $cart[$product->id_products] = $number;
            }

        }else {
            $cart[$product->id_products] = $number;
        }

        setcookie("cart",serialize($cart));

        return redirect('/shop/product/'.$product->id_products);

    }

    public function product($id){

        $product = Product::find($id);

        if (Session::get('user_id')== 2){
            $del = true ;
        }
        else{
            $del = false;
        }

        return view('product',['name'=>$product->name,'img'=>$product->photo, 'desc'=>$product->description, 'price'=>$product->price, 'id'=>$id, 'del' => $del]);
    }

    public function getReduceOne($id){
    }

    public function getAddOne($id){
    }

    public function getRemoveItem(){

        if (empty(Session::get('user_id'))){
            return redirect('/SignIn');
        }

        $product = Product::find($_POST["product"]);

        $number = $_POST["number"];

        if(isset($_COOKIE["cart"])) {
            $cart = unserialize($_COOKIE["cart"]);
            if (array_key_exists($product->id_products, $cart)) {
                if($number == 0) {
                    unset($cart[$product->id_products]);
                }else{
                    $cart[$product->id_products] = $number;
                }
            }
        }
        setcookie("cart",serialize($cart));


        return redirect('/shop/cart');
    }

    function send(){

        if (empty(Session::get('user_id'))){
            return redirect('/SignIn');
        }

        $cart = unserialize($_COOKIE["cart"]);

        $order = new Order();
        $order->creation_date = date('Y-m-d');
        $order->id_users = Session::get('user_id');

        $order->save();

        foreach ($cart as $item => $number){
            $product = Product::find($item);

            $product->orders()->attach($order->id_orders,['Quantity' => $number]);
        }

        setcookie("cart", null, 1);;

        return view('shop');
    }
}