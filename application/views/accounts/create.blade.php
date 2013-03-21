@layout('layouts.master')


@section('content')

	<div class="span12">

		@if ($errors->has())
			<div class="alert alert-error alert-block">
				<p>Some errors occurred:</p>
				<ul>
					{{ $errors->first('name', '<li>:message</li>') }}
				</ul>
			</div>
		@endif
		
		{{ Form::open('accounts/create', 'POST', array('class' => 'form-horizontal')) }}

			{{ Form::token() }}

			<div class="control-group">
				{{ Form::label('name', 'Bank Name', array('class' => 'control-label')) }}
				<div class="controls">
					{{ Form::text('name', Input::old('name')) }}
				</div><!-- .controls -->
			</div><!-- .control-group -->

			<div class="form-actions">
				{{ Form::button('Create Bank', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
			</div><!-- .form-actions -->

		{{ Form::close() }}

	</div><!-- .span12 -->

@endsection