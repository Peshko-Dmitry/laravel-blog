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
                  <!-- login form start -->
              <section>
                <div class="container">
                  <div class="row mt-5 d-flex justify-content-center">
                    <div class="col-6 shadow p-3 mb-5 bg-body rounded ">
                      <form action="{{route('admin.edit_process')}}" method="post" class="m-4">

                            @csrf

                          <div class="mb-3">
                            <label  for="exampleInputName" class="form-label">Name</label>
                            <input name="name" value="{{$admin->name}}" type="text" class="form-control @error('name') border-danger @enderror" id="exampleInputName" >
                            @error('name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input name="email" value="{{$admin->email}}" type="email" class="form-control @error('email') border-danger @enderror" id="exampleInputEmail1"
                              aria-describedby="emailHelp">
                            @error('email')
                              <p class="text-danger">{{$message}}</p>
                            @enderror
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input name="password" type="password" class="form-control @error('password') border-danger @enderror" id="exampleInputPassword1">
                            @error('password')
                              <p class="text-danger">{{$message}}</p>
                            @enderror
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Repeat Password</label>
                            <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') border-danger @enderror" id="exampleInputPassword1">
                            @error('password_confirmation')
                              <p class="text-danger">{{$message}}</p>
                            @enderror
                          </div>
                          <button type="submit" class="btn btn-dark">Изменить</button>
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