@extends('layouts.app')

@section('content')
<div class="container">

    <form action="{{route('post.update',$post->id) }}" method="POST">
        @csrf
        @method('POST')
        <div class="form-group">
          <label for="titulo">Titulo</label>
          <input type="text" name="titulo" class="form-control" id="titulo" value="{{ $post->titulo }}">
        </div>
        
        <div class="form-group">
          <label for="descripcion">Descripcion</label>
          <textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{ $post->descripcion }}</textarea>
        </div>

        <div>
            <button class="btn btn-primary">Actualizar</button>
        </div>
      </form>

</div>
@endsection
