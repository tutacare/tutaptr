@extends('home.app')

@section('content')
<script src="//cdn.ckeditor.com/4.4.7/standard/ckeditor.js"></script>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Add New Post</div>
				<div class="panel-body">
					{!! Html::ul($errors->all()) !!}

					{!! Form::open(array('url' => 'dashboard/posts', 'files' => true)) !!}

					<div class="form-group">
					{!! Form::label('post_title', 'Title') !!}
					{!! Form::text('post_title', Input::old('post_title'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('post_price', 'Price') !!}
					{!! Form::text('post_price', Input::old('post_price'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('post_description', 'Description') !!}
					{!! Form::textarea('post_description', Input::old('post_description'), array('rows' => '5', 'cols' => '80', 'class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('post_content', 'Content') !!}
					{!! Form::textarea('post_content', Input::old('post_content'), array('rows' => '10', 'cols' => '80', 'id' => 'editor1', 'class' => 'form-control')) !!}
					</div>


					{!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
            <script>
                CKEDITOR.replace( 'editor1' );
            </script>
@endsection
