$(document).ready(function()
{
	$(".buttonModify").on("click", function(event)
	{
		if ($("#nomClient").val() == "" || $("#numeroClient").val() == "")
		{
			Swal.fire(
			{
				title: 'Erreur !',
				text: 'Le champ nom ou numéro de téléphone n\'est pas rempli !',
				type: 'error',
				confirmButtonText: 'Confirmer'
			});
		}

		else
		{
			var idClient = $(".clientContainer").attr("id");

			var nomClient = $("#nomClient").val();
			var prenomClient = $("#prenomClient").val();
			var collectiviteClient = $("#collectiviteClient").val();
			var numeroClient = $("#numeroClient").val();
			var autreNumeroClient = $("#autreNumeroClient").val();
			var emailClient = $("#emailClient").val();

			$.ajax(
			{
				url : "../js/ajax_checkClient.php",
				type : "POST",
				data : {updateClient : 1, nomClient : nomClient, prenomClient : prenomClient, collectiviteClient : collectiviteClient, numeroClient : numeroClient, autreNumeroClient : autreNumeroClient, emailClient : emailClient, idClient : idClient},
				success : function(execute)
				{
					Swal.fire(
					{
						title: 'Success !',
						text: 'Les modifications ont bien étés sauvegardées !',
						type: 'success',
						confirmButtonText: 'Confirmer'
					});
				}
			});
		}
	});
});