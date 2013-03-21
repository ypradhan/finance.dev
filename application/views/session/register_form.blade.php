{{ Form::open('register', 'POST', array('class' => 'form-horizontal')) }}

	{{ Form::token() }}

	<div class="control-group">
		{{ Form::label('email', 'Email', array('class' => 'control-label')) }}
		<div class="controls">
			{{ Form::text('email', Input::old('email')) }}
		</div><!-- .controls -->
	</div><!-- .control-group -->

	<div class="control-group">
		{{ Form::label('password', 'Password', array('class' => 'control-label')) }}
		<div class="controls">
			{{ Form::password('password') }}
		</div><!-- .controls -->
	</div><!-- .control-group -->

	<div class="form-actions">
		{{ Form::button("Let's Go", array('type' => 'submit', 'class' => 'btn btn-primary')) }}
	</div><!-- .form-actions -->

{{ Form::close() }}