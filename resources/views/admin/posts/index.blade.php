@extends('layout.admin')
@section('title', 'edit')
    
@section('content')

<section>
    <div class="container-xxl-auto">
        <div class="row ">
            <div class="col-6 col-sm-5 col-md-4 col-lg-3 left-menu p-0 ">
                @include('admin.partials.left_block')
            </div>
            <div class="col-6 col-sm-7 col-md-8 col-lg-9 p-0 right-block">
                  <section>
                    <div class="container">
                      <div class="row mt-1 d-flex ">
                        <div class="col-12  p-3 mb-2">
                            <a href="{{route('admin.posts.create')}}" type="button" class="btn btn-primary">Добавить новость +</a>
                        </div>
                        @foreach ($posts as $post)
                            {{-- one news --}}
                        <div class="col-12 shadow p-3 mb-2 bg-body rounded m-2 ">
                            <div class="container ">
                                <div class="row">
                                    <div class="col-9 ">
                                        <p class="bg-light">ID: {{$post->id}}</p>
                                        <p>{{$post->title}}</p>
                                    </div>
                                    <div class="col-3 ">
                                        <a class="btn btn-outline-primary m-1" href="{{route('admin.posts.edit', $post->id )}}" role="button">Изменить</a>
                                        <form action="{{route('admin.posts.destroy', $post->id )}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger m-1" >Удалить</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- one news end--}}
                        @endforeach
                      </div>
                      {{$posts->links()}}
                    </div>
                  </section>
            </div>
        </div>
    </div>
</section>

@endsection
