<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 09/04/2018
 * Time: 22:14
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalerieController extends Controller
{
    public function index()
    {
        $photos = Photo::paginate(20);
        return view('galerie')->with('photos', $photos);
    }

    public function create()
    {
        return view('add-new-image');
    }

    public function store(Request $request)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }

    public function show($id)
    {
        $photo = Photo::find($id);
        return view('image-detail')->with('photo', $photo);
    }

    public function edit($id)
    {
        $photo = Photo::find($id);
        return view('edit-image')->with('photo', $photo);
    }
}