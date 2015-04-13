route('*', function() {
	if(history.state.url.length < (location.protocol + location.host).length + 4)
	{
		// in home page
		$('html').click(function(e)
		{
			if(!$(e.target).is('#langlist') )
			{
				$('form #url').focus();
				console.log(2);
			}
			
		});
		console.log(1);
	}
	else if(history.state.url.substr(-1) === '-')
	{
		// in details page
		$('html').click(function(e)
		{
			if(!$(e.target).is('#url') && !$(e.target).is('#langlist') )
			{
				$('#shorturl input').select();
				console.log(3);
			}

		});
		console.log(4);
	}
});
