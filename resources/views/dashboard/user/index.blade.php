@extends('home.app')

@section('content')
<div class="container">
            <div class="row">
        <div class="col-md-12">
            <h2>Users <a class="btn btn-primary" href="{{ URL::to('dashboard/users/create') }}" role="button">Add New</a></h2>
        </div>

        @if (Session::has('message'))
        	<div class="col-md-12">
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
          </div>
        @endif
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Name</td>
            <td>Email</td>
            <td>Role</td>
            <td>&nbsp;</td>
        </tr>
    </thead>
    <tbody>
    @foreach($user as $value)
        <tr>
            <td>{{ $value->name }}</td>
            <td>{{ $value->email }}</td>
            <td>{{$value->role}}</td>
            <td>
                <a class="btn btn-small btn-info" href="{{ URL::to('dashboard/users/' . $value->id . '/edit') }}">Edit</a>
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
    </div>
@endsection
