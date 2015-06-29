@extends('home.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
          @if (Session::has('message'))
          	<div class="alert alert-info">{{ Session::get('message') }}</div>
          @endif
          <table class="table table-striped table-bordered">
              <thead>
                  <tr>
                      <td>Post Title</td>
                      <td>&nbsp;</td>
                  </tr>
              </thead>
              <tbody>
              @foreach($post as $value)
                  <tr>
                      <td><a href="{{ URL::to('posts/' . $value->id . '/show/' . str_slug($value->post->post_title) ) }}">{{ $value->post->post_title }}</a></td>
                      <td>
                          {!! Form::open(array('url' => 'posts/' . $value->id)) !!}
                              {!! Form::hidden('_method', 'DELETE') !!}
                              {!! Form::submit('Delete', array('class' => 'btn btn-warning')) !!}
                          {!! Form::close() !!}
                      </td>
                  </tr>
              @endforeach
              </tbody>
          </table>
        </div>
        @include('home.sidebar')
    </div>
</div>

@endsection
