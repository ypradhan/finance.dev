@layout('layouts.master')

@section('content')

	@include('partials.sidebar')

	<div class="span9">
		
		<h2>{{ $account->name }} <small>{{ $account->balance }}</small></h2>
		
		{{ HTML::link_to_route('transactions.create', 'Add transaction', $account->id, array('class' => 'btn btn-small btn-success')) }}

		<script>
			window.recentTransactions = ' $json_transactions ';
		</script>
		<div id="example-chart"></div><!-- #example-chart -->
	
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Description</th>
					<th>Amount</th>
					<th>Category</th>
				</tr>
			</thead>
			<tbody>
			
			@if ($account->recent_transactions)
				{{ render_each('partials.transactions.row', $account->recent_transactions, 'transaction') }}
			@else
				<tr>
					<td colspan="3">No recent transactions.</td>
				</tr>
			@endif

			</tbody>
		</table>

	</div>

@endsection