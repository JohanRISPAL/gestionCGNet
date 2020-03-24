$("document").ready(function()
{
	$("#search").keypress(function(event) 
	{
		if(event.which == 13)
		{
			$("#sendButton").click();
		}
	});   

	$("#sendButton").on("click", function(event)
	{
		var toSearch = $("#search").val();

		$.ajax(
		{
			url : "../js/ajax_clients.php",
			type : "POST",
			data : {search : 1, toSearch : toSearch},
			success : function(execute)
			{
				var clientList = JSON.parse(execute);

				if (clientList.length == 0)
				{
					$(".clientContainer").empty();

					var clientInfo = document.createElement("div");
					$(clientInfo).addClass("clientInfo");

					var emptyList = document.createElement("p");
					$(emptyList).html("Il n'y a aucun résultat pour cette recherche");

					$(clientInfo).append(emptyList);

					$(".clientContainer").append(clientInfo);
				}

				else
				{
					$(".clientContainer").empty();

					for (var i = 0; i < clientList.length; i++)
					{
						var clientInfo = document.createElement("div");
						$(clientInfo).addClass("clientInfo");

						var nom = document.createElement("p");
						$(nom).html("Nom : ");

						var nomLien = document.createElement("a");
						$(nomLien).attr("href", "checkClient.php?idClient=" + clientList[i]["idClient"]);
						$(nomLien).html(clientList[i]["nomClient"]);

						var prenom = document.createElement("p");

						if (clientList[i]["prenomClient"] == "")
						{
							$(prenom).html("Prenom : Non renseigné");
						}

						else
						{
							$(prenom).html("Prenom : " + clientList[i]["prenomClient"]);
						}
						
						var collectivite = document.createElement("p");

						if (clientList[i]["collectiviteClient"] == "")
						{
							$(collectivite).html("Collectivité : Non renseigné");
						}

						else
						{
							$(collectivite).html("Collectivité : " + clientList[i]["collectiviteClient"]);
						}
						
						var numero = document.createElement("p");
						$(numero).html("Numéro : " + clientList[i]["numeroClient"]);

						var autreNumero = document.createElement("p");

						if (clientList[i]["autreNumeroClient"] == "")
						{
							$(autreNumero).html("Autre numéro : Non renseigné");
						}

						else
						{
							$(autreNumero).html("Autre numéro : " + clientList[i]["autreNumeroClient"]);
						}
						
						var email = document.createElement("p");

						if (clientList[i]["emailClient"] == "")
						{
							$(email).html("E-mail : Non renseigné");
						}

						else
						{
							$(email).html("E-mail : " + clientList[i]["emailClient"]);
						}
						
						$(nom).append(nomLien);

						$(clientInfo).append(nom);
						$(clientInfo).append(prenom);
						$(clientInfo).append(collectivite);
						$(clientInfo).append(numero);
						$(clientInfo).append(autreNumero);
						$(clientInfo).append(email);

						$(".clientContainer").append(clientInfo);
					}
				}
			}
		});
	});
});