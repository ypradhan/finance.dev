App.Views.Dashboard = Backbone.View.extend({
	initialize: function() {
		console.log('Hello World!');
		console.log( this.collection.toJSON() );
	}
});