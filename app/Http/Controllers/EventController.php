<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 10/04/2018
 * Time: 09:28
 */

namespace App\Http\Controllers;
use App\Providers\Like;
use Illuminate\Support\Facades\DB;
use App\Providers\Comment;
use App\Providers\Photo;
use App\Providers\Contain;
use App\Providers\User;
use App\Providers\Event;
use Illuminate\Http\Request;



class EventController extends Controller
{
    public function index()
    {


        $com = User::find(1)->comments()->each(function($book)
        {
            echo $book->name, '<br>';
        });



    }

    public function create(Request $request)
    {
        // if user can post i.e. user is admin or author
        if($request->user()->can_post())
        {
            return view('posts.create');
        }
        else
        {
            return redirect('/')->withErrors('You have not sufficient permissions for writing post');
        }
    }

    public function store(PostFormRequest $request)
    {
    }

    public function show($slug)
    {
    }

    public function edit(Request $request,$slug)
    {
    }

    public function update(Request $request)
    {
    }

    public function inscription($slug)
    {
    }

    public function destroy(Request $request, $id)
    {
    }

}