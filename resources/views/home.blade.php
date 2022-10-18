@extends('layout.app')
@section('title', 'home')
    

@section('content')
@include('partials.slider',['slider'=>$slider])
    <!-- last news start-->
    <section class="mt-3">
        <div class="container-xxl p-0">
            <div class="row">
                <h1 class="text-uppercase text-center">последние новости</h1>
                <div class="col-12">
                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        
                        @foreach($posts as $post)
                        <div class="col ">
                            <div class="card">
                                <a href="/news/{{$post->id}}">
                                    <img src="/storage/posts/{{$post->thumbnail}}" class="card-img-top" alt="...">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title">{{$post->title}}</h5>
                                    <p class="card-text">{{$post->preview}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- last news end-->
@endsection

    




