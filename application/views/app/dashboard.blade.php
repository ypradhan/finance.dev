@layout('layouts.master')

@section('content')

	@include('partials.sidebar')
	
	<div class="span9">
	
	@if ($accounts)

		<script>
			window.accounts = {{ $json_accounts }};
		</script>

		@foreach ($accounts as $account)
			
			<h2>
				{{ $account->name }}
				<small class="balance">{{ $account->balance }}</small>
			</h2>
			
			<table class="table table-hover">
				<thead>
					<tr>
						<th class="">Date</th>
						<th class="span5">Description</th>
						<th class="">Amount</th>
						<th class="">Category</th>
					</tr>
				</thead>
				<tbody>
				@forelse ($account->recent_transactions as $transaction)
					<tr>
						<td>{{ $transaction->date }}</td>
						<td>{{ $transaction->description }}</td>
						<td>{{ $transaction->amount }}</td>
						<td>{{ ( $transaction->category ) ? $transaction->category->name : 'No Category' }}</td>
					</tr>
				@empty
					<tr>
						<td colspan="3">No recent transactions.</td>
					</tr>
				@endforelse
				</tbody>
			</table>

		@endforeach
	@endif
		
	</div><!-- .span9 -->

@endsection