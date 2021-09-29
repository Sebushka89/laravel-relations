<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendNewMail;
use Illuminate\Support\Facades\Storage;

use App\Article;

use App\Author;

use App\Tag;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = article::all();
    
        //chiamato il view posts.index perche index.blade.php si trova dentro la cartella posts(creata da me) su view 
        return view('articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        $tags = Tag::all();
        return view('articles.create', compact('authors','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all(); // ritorna tutti i valori del form in un array associativo

        $article = new article();
    
        $article->title = $data['title'];

        
        $picturePath = Storage::put('images', $data['cover']);
        
        $article->cover = $picturePath;//con upload andava questo
        //$article->cover = $data['cover'];
        $article->text = $data['text'];
        $article->author_id=$data['author_id'];
        
        //$article->brand_new = key_exists('brand_new', $data) ? true: false;
        $article->save();  // salva nel database
        
        $article->tag()->sync($data['tags']);

        $authors = Author::all();
        
        foreach($authors as $author){
        Mail::to($author->email)->send(new SendNewMail($article));
        }//email mandata a tutti gli autori ciclando gli autori e usando il corrispondente indirizzo email 

        // foreach($authors as $author){
        //      Mail::to($author->email)->queue(new SendNewMail($article));
        // } mandare email scaglionate

        // Mail::to('info@test.it')->send(new SendNewMail($article)); email mandata a un singolo utente scrivendo la sua email
        return redirect()->route('articles.show', $article->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = article::find($id);
        

        return view('articles.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     
    }
}
