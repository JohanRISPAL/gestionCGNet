$(document).ready(function()
{
	$(".submitButton").on("click", function(event)
	{
		event.preventDefault();

		if ($("#nomClient").val() == "" || $("#numeroClient").val() == "" || $("#titreTache").val() == "")
		{
			Swal.fire(
			{
				title: 'Erreur !',
				text: 'Le champ nom, numéro de téléphone ou l\'intitulé de la tâche n\'est pas rempli !',
				type: 'error',
				confirmButtonText: 'Confirmer'
			});
		}

		else
		{
			var nomClient = $("#nomClient").val();
			var prenomClient = $("#prenomClient").val();
			var collectiviteClient = $("#collectiviteClient").val();
			var numeroClient = $("#numeroClient").val();
			var autreNumeroClient = $("#autreNumeroClient").val();
			var emailClient = $("#emailClient").val();

			var marqueMachine = $("#marqueMachine").val();
			var modeleMachine = $("#modeleMachine").val();
			var motDePasseMachine = $("#motDePasseMachine").val();

			var titreTache = $("#titreTache").val();
			var descriptionTache = $("#descriptionTache").val();
			var notesTache = $("#notesTache").val();
			var isUrgent = 0;

			if ($("#isUrgent").is(":checked"))
			{
				var isUrgent = 1;
			}

			$.ajax(
			{
				url : "../js/ajax_createTask.php",
				type : "POST",
				data : {isPosted : 1, nomClient : nomClient, prenomClient : prenomClient, collectiviteClient : collectiviteClient, numeroClient : numeroClient, autreNumeroClient : autreNumeroClient, emailClient : emailClient, marqueMachine : marqueMachine, modeleMachine : modeleMachine, motDePasseMachine : motDePasseMachine, titreTache : titreTache, descriptionTache : descriptionTache, notesTache : notesTache, isUrgent : isUrgent},
				success : function(execute)
				{
					$("#nomClient").val("");
					$("#prenomClient").val("");
					$("#collectiviteClient").val("");
					$("#numeroClient").val("");
					$("#autreNumeroClient").val("");
					$("#emailClient").val("");

					$("#marqueMachine").val("");
					$("#modeleMachine").val("");
					$("#motDePasseMachine").val("");

					$("#titreTache").val("");
					$("#descriptionTache").val("");
					$("#notesTache").val("");
					$("#isUrgent").prop("checked", false);

					Swal.fire(
					{
						title: 'Success !',
						text: 'La tâche a bien été créée !',
						type: 'success',
						confirmButtonText: 'Confirmer'
					});
				}
			});
		}
	});
});