@extends('home.app')

@section('content')
<div class="content-wrapper container-fluid">
            <div class="row">
        <div class="col-md-12">
            <h2>.</h2>
        </div>


    @foreach($post as $value)
     <h1>{{ $value->post_title }}</h1>
     {!! $value->post_content !!}

    @endforeach
    </div>
@endsection
