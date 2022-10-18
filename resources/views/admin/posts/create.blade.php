@extends('layout.admin')
@section('title', 'create')
    
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
                      <div class="row mt-2 d-flex justify-content-center">
                        <div class="col-10 shadow p-3 mb-5 bg-body rounded ">
                          <form action="{{route('admin.posts.store')}}" enctype="multipart/form-data" method="post" class="m-3">
                                @csrf
                                  <h1 class="text-center mb-2 text"><strong>Добавить</strong></h1>
                                  <div class="mb-3">
                                    <label for="exampleInputText1" class="form-label"><strong>Заголовок</strong></label>
                                    <input name="title" type="text" value="" class="form-control" id="exampleInputText1">
                                    @error('title')
                                    <p class="text-danger">{{$message}}</p>
                                  @enderror
                                  </div>
                                  <div class="mb-3">
                                    <label for="exampleInputText2" class="form-label"><strong>Превью</strong></label>
                                    <input name="preview" value="" type="text" class="form-control" id="exampleInputText2">
                                    @error('preview')
                                    <p class="text-danger">{{$message}}</p>
                                  @enderror
                                  </div>
                                  <div class="mb-3">
                                    <label for="exampleInputText3" class="form-label"><strong>Описание</strong></label>
                                    <textarea name="description" class="form-control" id="exampleInputText3" rows="6"></textarea>
                                    @error('description')
                                    <p class="text-danger">{{$message}}</p>
                                  @enderror  
                                </div>
                                  <div class="mb-3">
                                    <label for="exampleInputText4" class="form-label"><strong>Автор</strong></label>
                                    <input name="author" value="" type="text" class="form-control" id="exampleInputText4">
                                    @error('author')
                                    <p class="text-danger">{{$message}}</p>
                                  @enderror  
                                </div>
                                  <div class="form-check mb-3">
                                    <input name="slider"  class="form-check-input" type="checkbox"  id="flexCheckDefault">
                                    @error('slider')
                                    <p class="text-danger">{{$message}}</p>
                                  @enderror
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <strong>Добавить в слайдер</strong>
                                    </label>
                                  </div>
                                  <div class="form-file mb-3">
                                    <label for="exampleInputfile" class="form-label"><strong>Миниатюра</strong></label><br>
                                    <input name="thumbnail" type="file" class="form-file-input mt-1 " id="exampleInputfile">
                                    @error('thumbnail')
                                    <p class="text-danger">{{$message}}</p>
                                  @enderror  
                                </div>
                                  <button type="submit" class="btn btn-dark">Добавить</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </section>
            </div>
        </div>
    </div>
</section>

@endsection
