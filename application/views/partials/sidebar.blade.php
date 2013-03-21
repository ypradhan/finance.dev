<div class="span3">
	<div class="well bank-account-well">
		<ul class="nav nav-list bank-account-list">
			<li class="nav-header">Bank Accounts</li>

			@if ($accounts)
			
				@foreach ($accounts as $account)
					<li{{ ( URI::segment(2) == $account->id ) ? ' class="active"' : '' }}>
						{{ HTML::link_to_route('accounts.show', $account->name, $account->id) }}
					</li>
				@endforeach

				<li class="divider"></li>
			@endif
			<li>{{ HTML::link_to_route('accounts.create', 'Create Bank Account'); }}</li>
		</ul><!-- .nav.nav-list.bank-account-list -->
	</div><!-- .well -->
</div><!-- .span3 -->