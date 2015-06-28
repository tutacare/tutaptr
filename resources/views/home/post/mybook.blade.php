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
                      <td>user_id</td>
                      <td>post_id</td>
                      <td>&nbsp;</td>
                  </tr>
              </thead>
              <tbody>
              @foreach($post as $value)
                  <tr>
                      <td>{{ $value->user_id }}</td>
                      <td>{{ $value->post_id }}</td>
                      <td>
                          <a class="btn btn-small btn-info" href="{{ URL::to('dashboard/posts/' . $value->id . '/edit') }}">Edit</a>
                          {!! Form::open(array('url' => 'items/' . $value->id, 'class' => 'pull-right')) !!}
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
