@extends('layout.app')
@section('title', 'Login')
    
@section('content')
 <!-- login form start -->
 <section>
    <div class="container">
        <div class="row mt-5 d-flex justify-content-center ">
            <div class="col-6 shadow p-3 mb-5 bg-body rounded ">
                <form action="{{route('forgot_process')}}" method="post" class="m-4">
                    @csrf
                        <h3 class="text-center mb-4">Востановление пароля</h3>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input name="email" type="email" class="form-control @error('email') border-danger @enderror" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                            @error('email')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3 form-check">
                            <a href="{{route('login')}}" class="d-block mb-1">Вспомнил пароль</a>
                        </div>
                        <button type="submit" class="btn btn-dark">Войти</button>
                    </form>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- login form end -->

@endsection 