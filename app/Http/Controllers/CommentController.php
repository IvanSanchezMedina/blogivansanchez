<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comments;
use Auth;
class CommentController extends Controller
{
    public function __construct()
    {
        $this->comment = new Comments();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $rules = [
            'comentario'=>'required|min:2|max:200',
        ];
        $messages = [
            'comentario.min' => 'El titulo debe tener minimo 2 caracteres',
            'comentario.max' => 'El titulo debe tener maximo 200 caracteres',
        ];
        $validacion=  $this->validate($request, $rules, $messages);

        $newComment= $this->comment->create([
            'descripcion'=>$request->comentario,
            'id_autor'=>Auth::user()->id,
            'id_post'=>$request->id_post
        ]);

        return back()->with('success','Comentario agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
