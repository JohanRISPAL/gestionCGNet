$(document).ready(function()
{
	$(".menuButton").on("click", function(event)
	{
		var destination = $(this).attr("id");

		window.location.href = destination +".php";
	});
});