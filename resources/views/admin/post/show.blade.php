@extends('admin.layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <h1>Visualizza Post</h1>
                <img class="img-fluid" src="{{asset('storage/' . $post->cover)}}" alt="{{$post->title}}">
                <div><strong>Titolo: </strong>{{$post->title}}</div>
                <div><strong>Contenuto: </strong>{!! $post->content !!}</div>
                <div><strong>Slug: </strong>{{$post->slug}}</div>
                <div><strong>Categoria: </strong>{{$post->category->name}}</div>
                <div><strong>Post scritto: </strong>{{$diffInDays}} giorni fa</div>
                
                <div>
                    @foreach ($post->tags as $tag)
                        <span class="badge badge-primary">{{$tag->name}}</span>
                    @endforeach
                </div>

                <a href="{{route('admin.posts.index')}}" class="btn btn-primary">Torna alla lista</a>

            </div>
        </div>
    @endsection

