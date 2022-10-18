@extends('layout.app')
@section('title', $post->title)
    

@section('content')

<section class="mt-3">
    <div class="container p-0">
      <div class="row">
        <h1 class="text-uppercase text-center"></h1>
        <div class="col-8">
          <!-- one news -->
          <div class="card mb-3">
            <img src="/storage/posts/{{$post->thumbnail}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{$post->title}}</h5>
              <p class="card-text">{{$post->description}}</p>
              
              <p class="author">Author: {{$post->author}}</p>
              <p class="card-text"><small class="text-muted">{{$post->created_at}}</small></p>
            </div>
          </div>
          <!-- one news end -->
          <!-- add comment -->
          <div class="row bg-light">
            <form action="{{route('comment', $post->id)}}" method="POST">
              @csrf
              <h5 class="text-center p-2">Добавить комментарий.</h5>
              @auth
              <textarea name="text" class="form-control mb-3" rows="5" ></textarea>
              @error('text')
                        <p class="text-red-500">{{$message}}</p>
               @enderror
              <input type="submit" value="Отправить" class="btn btn-dark m-3 ">
              @endauth
              @guest
                  <p class="text-center">Только зарегестрированные пользователи могут оставлять комментарии!</p>
              @endguest
            </form>
          </div>
        <!-- end add comment -->
        <!-- comments post  -->
        <div class="row mt-3">
            <!-- one comment -->
            @foreach ($post->comments as $comment)
           
            <div class="card p-0 mt-2">
              <div class="card-header bg-secondary text-white">
                {{$comment->user->name}} 
              </div>
              <div class="card-body">
                <blockquote class="blockquote mb-0">
                  <p> {{$comment->text}} </p>
                  <p>{{$comment->created_at}}</p>
                </blockquote>
              </div>
            </div>
            @endforeach
            <!-- one comment end -->
        </div>
        <!-- end comments post -->

        </div>
        <div class="col-4">
          <!-- last news (6item)-->
            @foreach ($posts as $post)
            <a href="/news/{{$post->id}}" >
                <div class="card bg-dark text-white mb-1">
                    <img src="/storage/posts/{{$post->thumbnail}}" class="card-img filter" alt="...">
                    <div class="card-img-overlay">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text">{{$post->preview}}</p>
                        <p class="card-text">{{$post->created_at}}</p>
                    </div>
                </div>
            </a>
            @endforeach
          <!-- end last news -->
        </div>
      </div>
    </div>
  </section>
  <!-- last news end-->
@endsection