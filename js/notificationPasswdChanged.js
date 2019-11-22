$(document).ready(function()
{
	$('body').append('<div id=notif_container><div id="notif"><p id="message">Mot de passe mis à jour !</p></div></div>');

	$('#notif_container').css({"position":"fixed","display":"none","width":"100%","height":"70px","bottom":"0"});

	$('#notif').css({"background":"green","width":"50%","height":"50px","border-radius":"1em","margin-right":"auto","margin-left":"auto"});

	$('#message').css({"color":"black","text-align":"center","padding":"16px"});

	$('#notif_container').fadeIn(1000);

	setTimeout(function ()
	{
		$('#notif_container').fadeOut(1000);
	}, 5000);
});
