<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with(['category','tags'])->paginate(2); 

        $posts->each(function($post) {
            if ($post->cover) {
                $post->cover = url('storage/'.$post->cover);
            } else {
                $post->cover = url('img/fallback.png');
            }
        });

        return response()->json(
            [
                'results' => $posts,
                'success' => true
            ]
        );
    }

    public function show($slug) 
    {
        $post = Post::where('slug', '=', $slug)->with(['category','tags'])->first();

        if ($post->cover) {
            $post->cover = url('storage/'.$post->cover);
        } else {
            $post->cover = url('img/fallback_img.jpg');
        }

        if($post) {
            return response()->json(
                [
                    'results' => $post,
                    'success' => true
                ]
            );
        } else {
            return response()->json(
                [
                    'results' => 'Nessun risultato trovato',
                    'success' => false
                ]
            );
        }

    }

}