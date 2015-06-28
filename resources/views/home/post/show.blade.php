@extends('home.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
          <h1>{{ $post->post_title }}</h1>
          {{ $post->post_description }}
        </div>
        @include('home.sidebar')
    </div>
</div>

@endsection
