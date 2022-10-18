<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\ErrorHandler\Debug;

class PostController extends Controller
{

    public function index(){

        $posts = Post::query()->orderBy('id')->limit(4)->get();
        $slider = Post::query()->where('slider', '<>', 0)->get();

        return view('home', [
            'posts'=>$posts,
            'slider'=>$slider,
        ]);
    }
    public function allNews(){
        $posts = Post::query()->get();
        return view('news',[
            'posts'=>$posts,
        ]);
    }
    public function oneNews($id){
        $post = Post::findOrFail($id);
        $posts = Post::query()->orderBy('id')->limit(6)->get();
        return view('one_news',[
            'post'=>$post,
            'posts'=>$posts
        ]);
    }
    public function comment($id, CommentRequest $request){
        // dd($id);
        $post = Post::findOrFail($id);
        $post->comments()->create($request->validated());
        return redirect(route('one_news', $id));
    }


}

