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
    function index()
    {

        $com = Event::find(3)->photos()->each(function ($book) {
            echo $book->mail, '<br>';
        });

        function create(Request $request)
        {
            // if user can post i.e. user is admin or author
            if ($request->user()->can_post()) {
                return view('posts.create');
            } else {
                return redirect('/')->withErrors('You have not sufficient permissions for writing post');
            }
        }

        function store(PostFormRequest $request)
        {
            $post = new Activite();
            $post->titre = $request->get('titre');
            $post->body = $request->get('body');
            $post->slug = str_slug($post->titre);
            $post->ID_Type_Activite = 1;
            $post->ID_Author = $request->user()->id;
            if ($request->has('save')) {
                $post->Is_Deleted = 1;
                $message = 'Post saved successfully';
            } else {
                $post->Is_Deleted = 0;
                $message = 'Post published successfully';
            }
            $post->save();
            return redirect('edit/' . $post->slug)->withMessage($message);
        }

        function show($slug)
        {
            $post = Activite::where('slug', $slug)->first();
            if (!$post) {
                return redirect('/')->withErrors('requested page not found');
            }

            $comments = DB::table('commentaires')
                ->join('users', 'commentaires.ID_User', '=', 'users.id')
                ->select('users.name', 'users.prenom', 'commentaires.created_at', 'commentaires.commentaire', 'commentaires.ID_Activite')
                ->where('ID_Activite', '=', $post->id)->get();

            $inscris = Participe::selectRaw('COUNT(`ID_User`) as `participants`, `ID_Activite`')
                ->groupBy('ID_Activite')
                ->orderBy('participants', 'desc')
                ->where('ID_Activite', '=', $post->id)
                ->get();
            return view('show')->withPost($post)->with('comments', $comments)->with('inscris', $inscris);
        }

        function edit(Request $request, $slug)
        {
            $post = Activite::where('slug', $slug)->first();
            if ($post && ($request->user()->id == $post->ID_Author || $request->user()->is_admin()))
                return view('/edit')->with('post', $post);
            return redirect('/')->withErrors('you have not sufficient permissions');
        }

        function update(Request $request)
        {
            $post_id = $request->input('post_id');
            $post = Activite::find($post_id);
            if ($post && ($post->ID_Author == $request->user()->id || $request->user()->ID_Type_User == 3)) {
                $title = $request->input('titre');
                $slug = str_slug($title);
                $duplicate = Activite::where('slug', $slug)->first();
                if ($duplicate) {
                    if ($duplicate->id != $post_id) {
                        return redirect('edit/' . $post->slug)->withErrors('Title already exists.')->withInput();
                    } else {
                        $post->slug = $slug;
                    }
                }
                $post->titre = $title;
                $post->body = $request->input('body');
                if ($request->has('save')) {
                    $post->Is_Deleted = 1;
                    $message = 'Post saved successfully';
                    $landing = 'edit/' . $post->slug;
                } else {
                    $post->Is_Deleted = 0;
                    $message = 'Post updated successfully';
                    $landing = $post->slug;
                }
                $post->save();
                return redirect($landing)->withMessage($message);
            } else {
                return redirect('/activite')->withErrors('you have not sufficient permissions');
            }
        }

        function inscription($slug)
        {
            $post = Activite::where('slug', $slug)->first();
            if (!$post) {
                return redirect('/')->withErrors('requested page not found');
            }
            $inscris = DB::table('activites')
                ->join('users', 'activites.ID_Author', '=', 'users.id')
                ->select('users.name', 'users.prenom', 'activites.titre', 'activites.id', 'activites.body', 'activites.slug')
                ->where('activites.id', '=', $post->id)->get();
            return view('inscription')->withPost($post)->with('inscris', $inscris);
        }

        function destroy(Request $request, $id)
        {
            $post = Activite::find($id);
            if ($post && ($post->ID_Author == $request->user()->id || $request->user()->is_admin())) {
                $post->delete();
                $data['message'] = 'Post deleted Successfully';
            } else {
                $data['errors'] = 'Invalid Operation. You have not sufficient permissions';
            }
            return redirect('/activite')->with($data);
        }
    }
}