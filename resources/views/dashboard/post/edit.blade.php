@extends('home.app')

@section('content')
<script src="//cdn.ckeditor.com/4.4.7/standard/ckeditor.js"></script>
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Edit Post</div>
				<div class="panel-body">
					{!! Html::ul($errors->all()) !!}

					{!! Form::model($post, array('route' => array('dashboard.posts.update', $post->id), 'method' => 'PUT')) !!}

					<div class="form-group">
					{!! Form::label('post_title', 'Title') !!}
					{!! Form::text('post_title', null, array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('post_price', 'Price') !!}
					{!! Form::text('post_price', null, array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('post_description', 'Description') !!}
					{!! Form::textarea('post_description', null, array('rows' => '5', 'cols' => '80', 'class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('post_content', 'Content') !!}
					{!! Form::textarea('post_content', null, array('rows' => '10', 'cols' => '80', 'id' => 'editor1', 'class' => 'form-control')) !!}
					</div>


					{!! Form::submit('Edit', array('class' => 'btn btn-primary')) !!}

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>
@endsection
