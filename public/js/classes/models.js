/**
 * Account Model
 */
App.Models.Account = Backbone.Model.extend({
	// validate
	
	initialize: function() {
		this.transactions = new App.Collections.Transactions();
		this.transactions.url = '/accounts/' + this.id + '/transactions';

		this.recent_transactions = new App.Collections.Transactions();
		this.recent_transactions.url = '/accounts/' + this.id + '/recent-transactions';
	}
});

/**
 * Transaction Model
 */
App.Models.Transaction = Backbone.Model.extend({
	// validate
});

