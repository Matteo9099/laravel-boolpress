@extends('admin.layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <table class="table text-center">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($tags as $tag)
                           <tr>
                               <td>{{$tag->id}}</td>
                               <td>{{$tag->name}}</td>
                               <td>{{$tag->slug}}</td>
                               <td class="d-flex justify-content-center">
                                    <a href="{{ route('admin.tags.show', $tag->id) }}" class="btn btn-primary">Vedi</a>
                               </td>
                           </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
