@extends('home.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
			@foreach($post as $value)
			<h1><a href="{{ URL::to('posts/' . $value->id . '/show/' . str_slug($value->post_title) ) }}">{{ $value->post_title }}</a></h1>
			<p>{!! $value->post_description !!}</p>
      <p><a href="{{ URL::to('posts/' . $value->id . '/show/' . str_slug($value->post_title) ) }}" type="button" class="btn btn-primary">Continue Reading</a></p>
      <hr />
			@endforeach
        </div>
        @include('home.sidebar')
    </div>
</div>
@endsection
