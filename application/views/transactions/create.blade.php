@layout('layouts.master')

@section('content')

	@include('partials.sidebar')

	<div class="span9">
		
		<h2>Add a new transaction to {{ $account->name }}</h2>

		@if(Session::has('message'))
			<div class="alert alert-success">{{ Session::get('message') }}</div>
		@endif	

		@if ($errors->has())
			<div class="alert alert-error alert-block">
				<p>Some errors occurred:</p>
				<ul>
					{{ $errors->first('description', '<li>:message</li>') }}
					{{ $errors->first('amount', '<li>:message</li>') }}
					{{ $errors->first('date', '<li>:message</li>') }}
				</ul>
			</div>
		@endif

		{{ Form::open("accounts/{$account->id}/transactions", 'POST', array('class' => 'form-horizontal')) }}
	
			{{ Form::token() }}


			<div class="control-group">
				{{ Form::label('description', 'Description', array('class' => 'control-label')) }}
				<div class="controls">
					{{ Form::text('description', Input::old('description')) }}
				</div><!-- .controls -->
			</div><!-- .control-group -->

			<div class="control-group">
				{{ Form::label('amount', 'Amount', array('class' => 'control-label')) }}
				<div class="controls">
					{{ Form::text('amount', Input::old('amount')) }}
				</div><!-- .controls -->
			</div><!-- .control-group -->

			<div class="control-group">
				{{ Form::label('date', 'Date', array('class' => 'control-label')) }}
				<div class="controls">
					{{ Form::date('date', Input::old('date')) }}
				</div><!-- .controls -->
			</div><!-- .control-group -->

			<div class="form-actions">
				{{ Form::button('Create Bank', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
			</div><!-- .form-actions -->

		{{ Form::close() }}

	</div>

@endsection