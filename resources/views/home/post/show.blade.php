@extends('home.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
          {!! Html::ul($errors->all()) !!}
          <h1>{{ $post->post_title }}</h1>
          <p>{{ $post->post_description }}<p>
          <p>
					{!! Form::open(array('url' => 'posts/read-post')) !!}

          <input type="hidden" name="post_id" value="{{ $post->id }}">
          <input type="hidden" name="post_price" value="{{ $post->post_price }}">
          <button type="submit" class="btn btn-success">Pay ${{$post->post_price}} for Read</button>
					{!! Form::close() !!}
          </p>
        </div>
        @include('home.sidebar')
    </div>
</div>

@endsection
