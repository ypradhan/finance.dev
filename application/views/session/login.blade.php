@layout('layouts.master')

@section('content')

	<div class="span12">

		<div class="container-login">

			@if(Session::has('message'))
				<div class="alert alert-{{ Session::get('message-type') }}">{{ Session::get('message') }}</div>
			@endif	
			
			<h1>Login</h1>
			<p>Login using your registered account:</p>

			{{ Form::open('login', 'POST', array('id' => 'login', 'class' => 'form-horizontal form-login')) }}

				{{ Form::token() }}
				
				<div class="control-group">
					{{ Form::label('email', 'Email', array('class' => 'control-label')) }}

					<div class="controls">
						{{ Form::text('email', Input::old('email'), array('class' => 'login username-field', 'placeholder' => 'Email Address')) }}
					</div><!-- .controls -->

				</div><!-- .control-group -->

				<div class="control-group">
					{{ Form::label('password', 'Password', array('class' => 'control-label')) }}

					<div class="controls">
						{{ Form::password('password', array('class' => 'login password-field', 'placeholder' => 'Password')) }}
					</div><!-- .controls -->

				</div><!-- .control-group -->

				<div class="form-actions">
					{{ Form::button("Sign In", array('type' => 'submit', 'class' => 'btn btn-primary btn-large')) }}
				</div><!-- .form-actions -->

			{{ Form::close() }}

		</div><!-- .container-login -->

	</div><!-- .span12 -->

@endsection