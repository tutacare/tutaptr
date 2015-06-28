@extends('home.app')

@section('content')
<div class="container">
            <div class="row">
        <div class="col-md-12">
            <h2>Posts <a class="btn btn-primary" href="{{ URL::to('dashboard/posts/create') }}" role="button">Add New</a></h2>
        </div>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Title</td>
            <td>author</td>
            <td>&nbsp;</td>
        </tr>
    </thead>
    <tbody>
    @foreach($post as $value)
        <tr>
            <td>{{ $value->post_title }}</td>
            <td>{{ $value->user_id }}</td>
            <td>
                <a class="btn btn-small btn-info" href="{{ URL::to('items/' . $value->id . '/edit') }}">Edit</a>
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