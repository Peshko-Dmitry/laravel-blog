@extends('layout.admin')
@section('title', 'Login')
    
@section('content')
    <!-- login form start -->
    <section>
        <div class="container">
            <div class="row mt-5 d-flex justify-content-center">
                <div class="col-6 shadow p-3 mb-5 bg-body rounded">
                    <form action="{{route('admin.login_process')}}" method="post" class="m-4">
                        @csrf
                            <h1 class="text-center mb-4">Вход</h1>
                            @if(session()->has('text'))
                            <div class="p-3 mb-2 bg-success text-white">{{session()->get('text')}}</div>
                            @endif
                            
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input name="email" type="email" class="form-control @error('email') border-danger @enderror" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                @error('email')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label @error('password') border-danger @enderror">Password</label>
                                <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                                @error('password')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-dark">Войти</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- login form end -->

@endsection