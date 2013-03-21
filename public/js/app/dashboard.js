App.accounts = new App.Collections.Accounts();


if (window.accounts != 'undefined')
{
	App.accounts.reset(window.accounts);
	App.dashboard = new App.Views.Dashboard({ collection: App.accounts });
}
else
{
	// App.accounts.fetch().then(function() 
	// {
	// 	new App.Views.Dashboard({ collection: App.accounts });
	// });
}