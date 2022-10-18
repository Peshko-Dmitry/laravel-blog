@extends('layout.admin')
@section('title', 'index')
    
@section('content')

<section>
    <div class="container-xxl-auto">
        <div class="row ">
            <div class="col-6 col-sm-5 col-md-4 col-lg-3 left-menu p-0 ">
                @include('admin.partials.left_block')
            </div>
            <div class="col-6 col-sm-7 col-md-8 col-lg-9 p-0"></div>
        </div>
    </div>
</section>
@endsection