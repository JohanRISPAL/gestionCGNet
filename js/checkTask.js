$(document).ready(function()
{
	$(".buttonMakeUrgent").on("click", function(event)
	{
		var idTache = $(".taskContainer").attr("id");

		$.ajax(
		{
			url : "../js/ajax_checkTask.php",
			type : "POST",
			data : {changeUrgent : 2, idTache : idTache},
			success : function(execute)
			{
				Swal.fire(
				{
					title: 'Attention !',
					text: 'La tâche est désormais urgente !',
					type: 'warning',
					confirmButtonText: 'Confirmer'
				});

				$(".buttonMakeUrgent").fadeOut(1000);

				$(".urgentIndicator").fadeOut(1000);

				setTimeout(function()
				{
					$(".buttonUrgentContainer").empty();
					$(".buttonUrgentContainer").append(createMakeNonUrgentButton());

					$(".buttonMakeNonUrgent").fadeIn(1000);

					$(".urgentIndicator").html("Tâche urgente : Oui");
					$(".urgentIndicator").fadeIn(1000);
				}, 1000);
			}
		});
	});

	$(".buttonMakeNonUrgent").on("click", function(event)
	{
		var idTache = $(".taskContainer").attr("id");

		$.ajax(
		{
			url : "../js/ajax_checkTask.php",
			type : "POST",
			data : {changeUrgent : 1, idTache : idTache},
			success : function(execute)
			{
				Swal.fire(
				{
					title: 'Attention !',
					text: 'La tâche n\'est désormais plus urgente !',
					type: 'warning',
					confirmButtonText: 'Confirmer'
				});

				$(".buttonMakeNonUrgent").fadeOut(1000);

				$(".urgentIndicator").fadeOut(1000);

				setTimeout(function()
				{
					$(".buttonUrgentContainer").empty();
					$(".buttonUrgentContainer").append(createMakeUrgentButton());

					$(".buttonMakeUrgent").fadeIn(1000);

					$(".urgentIndicator").html("Tâche urgente : Non");
					$(".urgentIndicator").fadeIn(1000);
				}, 1000);
			}
		});
	});

	$(".buttonModify").on("click", function(event)
	{
		var idTache = $(".taskContainer").attr("id");

		var notesTache = $(".notesTextarea").val();
		var coutTache = $(".coutTextarea").val();
		var prixTache = $(".prixTextarea").val();

		$.ajax(
		{
			url : "../js/ajax_checkTask.php",
			type : "POST",
			data : {changeNotesCoutAndPrix : 1, notesTache : notesTache, coutTache : coutTache, prixTache : prixTache, idTache : idTache},
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
	});

	$(".buttonStart").on("click", function(event)
	{
		var idTache = $(".taskContainer").attr("id");

		$.ajax(
		{
			url : "../js/ajax_checkTask.php",
			type : "POST",
			data : {startTask : 1, idTache : idTache},
			success : function(execute)
			{
				Swal.fire(
				{
					title: 'Let\'s go !',
					text: 'La tâche est désormais commencée !',
					type: 'warning',
					confirmButtonText: 'Confirmer'
				});

				$(".buttonStart").fadeOut(1000);

				$(".startedIndicator").fadeOut(1000);

				setTimeout(function()
				{
					$(".buttonStartStopFinishRestartContainer").empty();
					$(".buttonStartStopFinishRestartContainer").append(createStopButton());
					$(".buttonStartStopFinishRestartContainer").append(createFinishButton());

					$(".buttonStop").fadeIn(1000);
					$(".buttonFinish").fadeIn(1000);

					$(".startedIndicator").html("Tâche commencée : Oui");
					$(".startedIndicator").fadeIn(1000);
				}, 1000);
			}
		});
	});

	$(".buttonStop").on("click", function(event)
	{
		var idTache = $(".taskContainer").attr("id");

		$.ajax(
		{
			url : "../js/ajax_checkTask.php",
			type : "POST",
			data : {stopTask : 1, idTache : idTache},
			success : function(execute)
			{
				Swal.fire(
				{
					title: 'Stop !',
					text: 'La tâche est désormais en attente !',
					type: 'warning',
					confirmButtonText: 'Confirmer'
				});

				$(".buttonStop").fadeOut(1000);
				$(".buttonFinish").fadeOut(1000);

				$(".startedIndicator").fadeOut(1000);

				setTimeout(function()
				{
					$(".buttonStartStopFinishRestartContainer").empty();
					$(".buttonStartStopFinishRestartContainer").append(createStartButton());

					$(".buttonStart").fadeIn(1000);

					$(".startedIndicator").html("Tâche commencée : Non");
					$(".startedIndicator").fadeIn(1000);
				}, 1000);
			}
		});
	});

	$(".buttonFinish").on("click", function(event)
	{
		var idTache = $(".taskContainer").attr("id");

		$.ajax(
		{
			url : "../js/ajax_checkTask.php",
			type : "POST",
			data : {finishTask : 1, idTache : idTache},
			success : function(execute)
			{
				Swal.fire(
				{
					title: 'Travail terminé !',
					text: 'La tâche est désormais terminée et archivée !',
					type: 'success',
					confirmButtonText: 'Confirmer'
				});

				$(".buttonFinish").fadeOut(1000);

				$(".startedIndicator").fadeOut(1000);
				$(".doneIndicator").fadeOut(1000);

				setTimeout(function()
				{
					$(".buttonStartStopFinishRestartContainer").empty();
					$(".buttonStartStopFinishRestartContainer").append(createRestartButton());

					$(".buttonRestart").fadeIn(1000);

					$(".startedIndicator").html("Tâche commencée : Non");
					$(".startedIndicator").fadeIn(1000);

					$(".doneIndicator").html("Tâche terminée : Oui")
					$(".doneIndicator").fadeIn(1000);
				}, 1000);
			}
		});
	});

	$(".buttonRestart").on("click", function(event)
	{
		var idTache = $(".taskContainer").attr("id");

		$.ajax(
		{
			url : "../js/ajax_checkTask.php",
			type : "POST",
			data : {restartTask : 1, idTache : idTache},
			success : function(execute)
			{
				Swal.fire(
				{
					title: 'Encore du travail ?',
					text: 'La tâche est désormais désarchivée !',
					type: 'warning',
					confirmButtonText: 'Confirmer'
				});

				$(".buttonRestart").fadeOut(1000);

				$(".doneIndicator").fadeOut(1000);

				setTimeout(function()
				{
					$(".buttonStartStopFinishRestartContainer").empty();
					$(".buttonStartStopFinishRestartContainer").append(createStartButton());

					$(".buttonStart").fadeIn(1000);

					$(".doneIndicator").html("Tâche terminée : Non")
					$(".doneIndicator").fadeIn(1000);
				}, 1000);
			}
		});
	});
});

function createMakeUrgentButton()
{
	var buttonMakeUrgent = document.createElement("button");
	$(buttonMakeUrgent).addClass("button buttonMakeUrgent");
	$(buttonMakeUrgent).html("Tâche urgente");
	$(buttonMakeUrgent).css("display", "none");
	$(buttonMakeUrgent).on("click", function(event)
	{
		var idTache = $(".taskContainer").attr("id");

		$.ajax(
		{
			url : "../js/ajax_checkTask.php",
			type : "POST",
			data : {changeUrgent : 2, idTache : idTache},
			success : function(execute)
			{
				Swal.fire(
				{
					title: 'Attention !',
					text: 'La tâche est désormais urgente !',
					type: 'warning',
					confirmButtonText: 'Confirmer'
				});

				$(".buttonMakeUrgent").fadeOut(1000);

				$(".urgentIndicator").fadeOut(1000);

				setTimeout(function()
				{
					$(".buttonUrgentContainer").empty();
					$(".buttonUrgentContainer").append(createMakeNonUrgentButton());

					$(".buttonMakeNonUrgent").fadeIn(1000);

					$(".urgentIndicator").html("Tâche urgente : Oui");
					$(".urgentIndicator").fadeIn(1000);
				}, 1000);
			}
		});
	});

	return buttonMakeUrgent;
}

function createMakeNonUrgentButton()
{
	var buttonMakeNonUrgent = document.createElement("button");
	$(buttonMakeNonUrgent).addClass("button buttonMakeNonUrgent");
	$(buttonMakeNonUrgent).html("Tâche non urgente");
	$(buttonMakeNonUrgent).css("display", "none");
	$(buttonMakeNonUrgent).on("click", function(event)
	{
		var idTache = $(".taskContainer").attr("id");

		$.ajax(
		{
			url : "../js/ajax_checkTask.php",
			type : "POST",
			data : {changeUrgent : 1, idTache : idTache},
			success : function(execute)
			{
				Swal.fire(
				{
					title: 'Attention !',
					text: 'La tâche n\'est désormais plus urgente !',
					type: 'warning',
					confirmButtonText: 'Confirmer'
				});

				$(".buttonMakeNonUrgent").fadeOut(1000);

				$(".urgentIndicator").fadeOut(1000);

				setTimeout(function()
				{
					$(".buttonUrgentContainer").empty();
					$(".buttonUrgentContainer").append(createMakeUrgentButton());

					$(".buttonMakeUrgent").fadeIn(1000);

					$(".urgentIndicator").html("Tâche urgente : Non");
					$(".urgentIndicator").fadeIn(1000);
				}, 1000);
			}
		});
	});

	return buttonMakeNonUrgent;
}

function createStartButton()
{
	var buttonStart = document.createElement("button");
	$(buttonStart).addClass("button buttonStart");
	$(buttonStart).html("Commencer la tâche");
	$(buttonStart).css("display", "none");
	$(buttonStart).on("click", function(event)
	{
		var idTache = $(".taskContainer").attr("id");

		$.ajax(
		{
			url : "../js/ajax_checkTask.php",
			type : "POST",
			data : {startTask : 1, idTache : idTache},
			success : function(execute)
			{
				Swal.fire(
				{
					title: 'Let\'s go !',
					text: 'La tâche est désormais commencée !',
					type: 'warning',
					confirmButtonText: 'Confirmer'
				});

				$(".buttonStart").fadeOut(1000);

				$(".startedIndicator").fadeOut(1000);

				setTimeout(function()
				{
					$(".buttonStartStopFinishRestartContainer").empty();
					$(".buttonStartStopFinishRestartContainer").append(createStopButton());
					$(".buttonStartStopFinishRestartContainer").append(createFinishButton());

					$(".buttonStop").fadeIn(1000);
					$(".buttonFinish").fadeIn(1000);

					$(".startedIndicator").html("Tâche commencée : Oui");
					$(".startedIndicator").fadeIn(1000);
				}, 1000);
			}
		});
	});

	return buttonStart;
}

function createStopButton()
{
	var buttonStop = document.createElement("button");
	$(buttonStop).addClass("button buttonStop");
	$(buttonStop).html("Mettre en pause");
	$(buttonStop).css("display", "none");
	$(buttonStop).on("click", function(event)
	{
		var idTache = $(".taskContainer").attr("id");

		$.ajax(
		{
			url : "../js/ajax_checkTask.php",
			type : "POST",
			data : {stopTask : 1, idTache : idTache},
			success : function(execute)
			{
				Swal.fire(
				{
					title: 'Stop !',
					text: 'La tâche est désormais en attente !',
					type: 'warning',
					confirmButtonText: 'Confirmer'
				});

				$(".buttonStop").fadeOut(1000);
				$(".buttonFinish").fadeOut(1000);

				$(".startedIndicator").fadeOut(1000);

				setTimeout(function()
				{
					$(".buttonStartStopFinishRestartContainer").empty();
					$(".buttonStartStopFinishRestartContainer").append(createStartButton());

					$(".buttonStart").fadeIn(1000);

					$(".startedIndicator").html("Tâche commencée : Non");
					$(".startedIndicator").fadeIn(1000);
				}, 1000);
			}
		});
	});

	return buttonStop;
}

function createFinishButton()
{
	var buttonFinish = document.createElement("button");
	$(buttonFinish).addClass("button buttonFinish");
	$(buttonFinish).html("Tâche terminée");
	$(buttonFinish).css("display", "none");
	$(buttonFinish).on("click", function(event)
	{
		var idTache = $(".taskContainer").attr("id");

		$.ajax(
		{
			url : "../js/ajax_checkTask.php",
			type : "POST",
			data : {finishTask : 1, idTache : idTache},
			success : function(execute)
			{
				Swal.fire(
				{
					title: 'Travail terminé !',
					text: 'La tâche est désormais terminée et archivée !',
					type: 'success',
					confirmButtonText: 'Confirmer'
				});

				$(".buttonFinish").fadeOut(1000);

				$(".startedIndicator").fadeOut(1000);
				$(".doneIndicator").fadeOut(1000);

				setTimeout(function()
				{
					$(".buttonStartStopFinishRestartContainer").empty();
					$(".buttonStartStopFinishRestartContainer").append(createRestartButton());

					$(".buttonRestart").fadeIn(1000);

					$(".startedIndicator").html("Tâche commencée : Non");
					$(".startedIndicator").fadeIn(1000);

					$(".doneIndicator").html("Tâche terminée : Oui")
					$(".doneIndicator").fadeIn(1000);
				}, 1000);
			}
		});
	});

	return buttonFinish;
}

function createRestartButton()
{
	var buttonRestart = document.createElement("button");
	$(buttonRestart).addClass("button buttonRestart");
	$(buttonRestart).html("Sortir des archives");
	$(buttonRestart).css("display", "none");
	$(buttonRestart).on("click", function(event)
	{
		var idTache = $(".taskContainer").attr("id");

		$.ajax(
		{
			url : "../js/ajax_checkTask.php",
			type : "POST",
			data : {restartTask : 1, idTache : idTache},
			success : function(execute)
			{
				Swal.fire(
				{
					title: 'Encore du travail ?',
					text: 'La tâche est désormais désarchivée !',
					type: 'warning',
					confirmButtonText: 'Confirmer'
				});

				$(".buttonRestart").fadeOut(1000);

				$(".doneIndicator").fadeOut(1000);

				setTimeout(function()
				{
					$(".buttonStartStopFinishRestartContainer").empty();
					$(".buttonStartStopFinishRestartContainer").append(createStartButton());

					$(".buttonStart").fadeIn(1000);

					$(".doneIndicator").html("Tâche terminée : Non")
					$(".doneIndicator").fadeIn(1000);
				}, 1000);
			}
		});
	});

	return buttonRestart;
}