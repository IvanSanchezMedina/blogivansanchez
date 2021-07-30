<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
Use Session;
Use Redirect;
class PostController extends Controller
{
    public function __construct()
    {
        $this->post = new Post();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 1;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'titulo'=>'required|min:2|max:200',
            'descripcion'=>'required|min:2|max:200',
        ];
        $messages = [
            'titulo.min' => 'El titulo debe tener minimo 2 caracteres',
            'titulo.max' => 'El titulo debe tener maximo 200 caracteres',
            'descripcion.min' => 'El titulo debe tener minimo 2 caracteres',
            'descripcion.max' => 'El titulo debe tener maximo 200 caracteres',
        ];
        $validacion=  $this->validate($request, $rules, $messages);

        $newPost= $this->post->create([
            'titulo'=>$request->titulo,
            'descripcion'=>$request->descripcion,
            'id_autor'=>Auth::user()->id
        ]);

        return redirect()->route('home')->with('success','Post creado correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post= $this->post
        ->with('comments.autor')
        ->find($id);
        return view('Post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // return $post;
        return view('Post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // return $request;
        $rules = [
            'titulo'=>'required|min:2|max:200',
            'descripcion'=>'required|min:2|max:200',
        ];
        $messages = [
            'titulo.min' => 'El titulo debe tener minimo 2 caracteres',
            'titulo.max' => 'El titulo debe tener maximo 200 caracteres',
            'descripcion.min' => 'El titulo debe tener minimo 2 caracteres',
            'descripcion.max' => 'El titulo debe tener maximo 200 caracteres',
        ];
        $validacion=  $this->validate($request, $rules, $messages);

        $updatePost= $this->post->where('id',$id)->update([
            'titulo'=>$request->titulo,
            'descripcion'=>$request->descripcion,
        ]);

        return redirect()->route('home')->with('success','Post actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('home')->with('success','Post eliminado correctamente');
    }
}
