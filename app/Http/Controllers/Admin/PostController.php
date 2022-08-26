<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Mail\PostCreatedMail;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class PostController extends Controller
{

    private function findBySlug($slug)
    {
        $post = Post::where("slug", $slug)->first();

        if (!$post) {
            abort(404);
        }

        return $post;
    }

    private function generateSlug($text)
    {
        $toReturn = null;
        $counter = 0;

        do {
            // generiamo uno slug partendo dal titolo
            $slug = Str::slug($text);

            // se il counter é maggiore di 0, concateno il suo valore allo slug
            if ($counter > 0) {
                $slug .= "-" . $counter;
            }

            // controllo a db se esiste già uno slug uguale
            $slug_esiste = Post::where("slug", $slug)->first();

            if ($slug_esiste) {
                // se esiste, incremento il contatore per il ciclo successivo
                $counter++;
            } else {
                // Altrimenti salvo lo slug nei dati del nuovo post
                $toReturn = $slug;
            }
        } while ($slug_esiste);

        return $toReturn;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy("created_at")->get();

        return view("admin.posts.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags= Tag::all();
        return view("admin.posts.create", compact("categories", "tags"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        //validare dati
        $validatedData = $request->validated();
        //creare istanza e salvare dati su db

        $file=$validatedData["image"];
        $pathImg= Storage::put("/", $file);
        $post = new Post();
        $post->image = $pathImg;
        $post->fill($validatedData);
        $post->slug = $this->generateSlug($post->title);
        $post->save();
        //reindirizzare su una pagina a piacimento
        if (key_exists("tags", $validatedData)) {
            $post->tag()->attach($validatedData["tags"]);
        }
        Mail::to("mario.rossi@gmail.com")->send(new PostCreatedMail($post));
        return redirect()->route("admin.posts.show", $post->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = $this->findBySlug($slug);
        return view("admin.posts.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {   
        $post = $this->findBySlug($slug);
        $categories = Category::all();
        $tags = Tag::all();
        return view("admin.posts.edit", compact("post", "categories","tags"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $slug)
    {
        $validatedData = $request->validated();
        $post = $this->findBySlug($slug);

        

        if(key_exists("image", $validatedData)){
            if ($post->image) {
                Storage::delete($post->image);
            }
            $img = Storage::put("/", $validatedData["cover_img"]);
            $post->image = $img;
        }

        if ($validatedData["title"] !== $post->title) {
            // genero un nuovo slug
            $post->slug = $this->generateSlug($validatedData["title"]);
        }
        if (key_exists("tags", $validatedData)) {
            $post->tag()->sync($validatedData["tags"]);
        } else {
            $post->tag()->sync([]);
        }
        $post->update($validatedData);

        return redirect()->route("admin.posts.show", $post->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = $this->findBySlug($slug);
        $post->tag()->detach();
        $post->delete();

        return redirect()->route("admin.posts.index");
    }
}
