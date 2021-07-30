@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mt-3 mb-3" >
                    <a href="{{ route('post.create') }}" class="btn btn-primary">Crear Post</a>
            </div>
           
            <div class="">
                
                
                <div class="card-header">Posts</div>

                <div>
                    @foreach ($posts as $post)
                        <div class="card mt-4 mb-4">
                        <div class="card-header">
                          {{ $post->titulo }}  
                          @if ($post->autor->id ==   Auth::user()->id )
                          <a  class="float-right" href="{{ route('post.edit',$post->id) }}"><i class="bi bi-pencil-square"></i></a>
                          <a  class="float-right" href="{{ route('post.destroy',$post->id) }}"><i class="bi bi-trash"></i></a>
                          
                          @endif
                        </div>
                        <div class="card-body">
                          <h5 class="card-title">{{ $post->autor->name }}</h5>
                          <p class="card-text">{{ $post->descripcion }}</p>
                          <a href="{{ route('post.show',$post->id) }}" class="btn btn-primary">Comentar</a>
                        </div>
                      </div>
                    @endforeach
                    
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
