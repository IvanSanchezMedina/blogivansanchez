@extends('layouts.app')

@section('content')
<div class="container">
    <div class="form-group">
        <a class="btn btn-success" href="{{ route('home') }}">Ver posts</a>
    </div>
    <div class="card mt-4 mb-4">
        <div class="card-header">
            {{ $post->titulo }}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $post->autor->name }}</h5>
            <p class="card-text">{{ $post->descripcion }}</p>
            <div class=" ml-5 mt-5 mb-3">
                <h6>Comentarios</h6>

                @foreach ($post->comments as $comment)
                <div>
                    <label for="">{{ $comment->descripcion }} - <b>{{ $comment->autor->name }}</b></label>
                </div>

                @endforeach
            </div>
        </div>

    </div>

    <form action="{{ route('comment.store') }}" method="POST">
        @csrf
        @method('POST')
        <div class="form-group">
            <input type="hidden" name="id_post" value="{{ $post->id }}">
            <label for="comentario">Comenta</label>
            <input type="text" maxlength="200" name="comentario" class="form-control" id="comentario" aria-describedby="Comenta">
            <small id="emailHelp" class="form-text text-muted">Máximo 200 caracteres</small>
        </div>
        <button type="submit" class="btn btn-primary">Comentar</button>
    </form>
</div>
@endsection
