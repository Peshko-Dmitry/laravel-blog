@extends('layout.app')
@section('title', 'home')
    

@section('content')

    <!-- last news start-->
    <section class="mt-3">
        <div class="container p-0">
            <div class="row">
                <h1 class="text-uppercase text-center">Все новости</h1>
                <div class="col-12">
                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        @foreach ($posts as $post)
                        <!-- one card start -->
                        <div class="card mb-3">
                            <a href="/news/{{$post->id}}">
                                <img src="/storage/posts/{{$post->thumbnail}}" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">{{$post->title}}</h5>
                                <p class="card-text">{{$post->preview}}</p>
                                <p class="card-text"><small class="text-muted">{{$post->created_at}}</small></p>
                            </div>
                        </div>
                        <!-- one card end -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- last news end-->
@endsection

    




