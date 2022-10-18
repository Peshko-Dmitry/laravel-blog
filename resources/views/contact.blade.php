@extends('layout.app')
@section('title', 'home')
    

@section('content')

<section>
  <div class="container ">
      <div class="row mt-5 d-flex justify-content-center">
          <div class="col-6 shadow p-3 mb-5 bg-body rounded">
              <form action="{{route('contact_form_process')}}" method="post" class="m-4">
                  @csrf
                      <h1 class="text-center mb-4">Свяжитесь с нами</h1>
                      <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Email</label>
                          <input name="email" type="email" class="form-control @error('email') border-danger @enderror" id="exampleInputEmail1"
                              aria-describedby="emailHelp">
                            @error('email')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                      </div>
                      <div class="mb-3">
                          <label for="exampleInputText" class="form-label">Сообщение</label>
                          <textarea name="text" name="text"type="password" class="form-control @error('email') border-danger @enderror" id="exampleInputText" rows="6" ></textarea>
                          @error('text')
                          <p class="text-danger">{{$message}}</p>
                          @enderror
                        </div>
                      <button type="submit" class="btn btn-dark">Отправить</button>
              </form>
          </div>
      </div>
  </div>
</section>


@endsection

    




