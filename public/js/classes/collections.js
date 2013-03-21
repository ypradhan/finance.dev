/**
 * Account Collection
 */
App.Collections.Accounts = Backbone.Collection.extend({
	model: App.Models.Account,
	url: '/accounts'
});

/**
 * Transaction Collection
 */
App.Collections.Transactions = Backbone.Collection.extend({
	model: App.Models.Transaction
	// url: '/accounts/:id/transactions'
});