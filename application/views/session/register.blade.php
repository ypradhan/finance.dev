@layout('layouts.master')

@section('content')

	<div class="span12">
	
		@if ($errors->has())
			<div class="alert alert-error alert-block">
				<p>Some errors occurred:</p>
				<ul>
					{{ $errors->first('email', '<li>:message</li>') }}
					{{ $errors->first('password', '<li>:message</li>') }}
				</ul>
			</div>
		@endif

		{{ render('session.register_form') }}

	</div><!-- .span12 -->

@endsection