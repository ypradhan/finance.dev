
<tr>
	<td>{{ $transaction->description }}</td>
	<td>{{ $transaction->amount }}</td>
	<td>{{ ( $transaction->category ) ? $transaction->category->name : 'No Category' }}</td>
</tr>