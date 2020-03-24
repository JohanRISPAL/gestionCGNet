<link rel="stylesheet" type="text/css" href="../css/checkTask.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="../js/checkTask.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<?php
	include("include/header.php");
	include("include/menu.php");
	include("include/functions.php");

	if (empty($_GET["idTache"]))
	{
		header("location: tasks.php");
	}

	else
	{
		$idTache = $_GET["idTache"];
		$tacheData = requestTacheData($idTache);

		if ($tacheData == false)
		{
			header("location: tasks.php");
		}

		else
		{
			$tacheData = $tacheData[0];
		}
	}
?>

<h1>Analyse d'une tâche</h1>

<div class="globalContainer">
	<div class="taskContainer" id="<?php echo $tacheData["idTache"]?>">
		<h2>Informations de la tâche</h2>
		<div class="taskHeader">
			<p>Tâche N°<?php echo($tacheData["idTache"]) ?></p>
			<p>Intitulé : <?php echo($tacheData["titreTache"]) ?></p>
			<p>Date début : <?php echo(date("d-m-Y", strtotime($tacheData["dateDebutTache"])))?></p>

			<?php
				if ($tacheData["dateFinTache"] == null)
				{
					?>

					<p>Date fin : non terminée</p>

					<?php
				}

				else
				{
					?>

					<p>Date fin : <?php echo(date("d-m-Y", strtotime($tacheData["dateFinTache"])))?></p>

					<?php
				}
			?>
		</div>

		<div class="taskStatus">
			<?php
				if ($tacheData["isUrgent"] == 1)
				{
					?>

					<p class="urgentIndicator">Tâche urgente : Oui</p>

					<?php
				}

				else
				{
					?>

					<p class="urgentIndicator">Tâche urgente : Non</p>

					<?php
				}

				if ($tacheData["isStarted"] == 1)
				{
					?>

					<p class="startedIndicator">Tâche commencée : Oui</p>

					<?php
				}

				else
				{
					?>

					<p class="startedIndicator">Tâche commencée : Non</p>

					<?php
				}

				if ($tacheData["isDone"] == 1)
				{
					?>

					<p class="doneIndicator">Tâche terminée : Oui</p>

					<?php
				}

				else
				{
					?>

					<p class="doneIndicator">Tâche terminée : Non</p>

					<?php
				}
			?>
		</div>

		<div class="taskInfo">
			<div class="descriptionContainer">
				<p>Description de la tâche</p>
				<?php
					if (empty($tacheData["descriptionTache"]))
					{
						?>

						<p>Aucune description</p>

						<?php
					}

					else
					{
						?>

						<p><?php echo $tacheData["descriptionTache"] ?></p>

						<?php
					}
				?>
			</div>

			<div class="notesContainer">
				<p>Notes de la tâches</p>
				<textarea class="notesTextarea" placeholder="Notes" rows="8" cols="60"><?php echo($tacheData["notesTache"]) ?></textarea>
			</div>
		</div>

		<div class="taskCompta">
			<div class="coutContainer">
				<p>Coût de l'intervention</p>
				<textarea class="coutTextarea" placeholder="Coût" rows="8" cols="60"><?php echo($tacheData["coutTache"]) ?></textarea>
			</div>

			<div class="prixContainer">
				<p>Prix de l'intervention</p>
				<textarea class="prixTextArea" placeholder="Prix" rows="8" cols="60"><?php echo($tacheData["prixTache"]) ?></textarea>
			</div>
		</div>

		<div class="buttonContainer">
			<div class="buttonUrgentContainer">
				<?php
					if ($tacheData["isUrgent"] == 0)
					{
						?>

						<button class="button buttonMakeUrgent">Tâche urgente</button>	

						<?php
					}

					else
					{
						?>

						<button class="button buttonMakeNonUrgent">Tâche non urgente</button>	

						<?php
					}
				?>
			</div>

			<button class="button buttonModify">Enregister modifications</button>
			
			<div class="buttonStartStopFinishRestartContainer">
				<?php
					if ($tacheData["isStarted"] == 1)
					{
						?>

						<button class="button buttonStop">Mettre en pause</button>
						<button class="button buttonFinish">Tâche terminée</button>	

						<?php
					}

					else if ($tacheData["isDone"] == 1)
					{
						?>

						<button class="button buttonRestart">Sortir des archives</button>	

						<?php
					}

					else
					{
						?>

						<button class="button buttonStart">Commencer la tâche</button>	

						<?php
					}
				?>
			</div>
		</div>
	</div>

	<div class="clientContainer">
		<h2>Informations du client</h2>

		<div class="clientInfo">
			<p>
				Nom : <a href="checkClient.php?idClient=<?php echo($tacheData["idClient"]) ?>"><?php echo($tacheData["nomClient"]) ?></a>
			</p>

			<?php
				if ($tacheData["prenomClient"] == null)
				{
					?>

					<p>Prénom : Non renseigné</p>

					<?php
				}

				else
				{
					?>

					<p>Prénom : <?php echo($tacheData["prenomClient"])?></p>

					<?php
				}

				if ($tacheData["collectiviteClient"] == null)
				{
					?>

					<p>Collectivité : Non renseigné</p>

					<?php
				}

				else
				{
					?>

					<p>Collectivité : <?php echo($tacheData["collectiviteClient"])?></p>

					<?php
				}
			?>

			<p>Numéro : <?php echo($tacheData["numeroClient"])?></p>

			<?php
				if ($tacheData["autreNumeroClient"] == null)
				{
					?>

					<p>Autre numéro : Non renseigné</p>

					<?php
				}

				else
				{
					?>

					<p>Autre numéro : <?php echo($tacheData["autreNumeroClient"])?></p>

					<?php
				}

				if ($tacheData["emailClient"] == null)
				{
					?>

					<p>E-mail : Non renseigné</p>

					<?php
				}

				else
				{
					?>

					<p>E-mail : <?php echo($tacheData["emailClient"])?></p>

					<?php
				}
			?>
		</div>
	</div>

	<div class="machineContainer">
		<h2>Informations de la machine</h2>

		<div class="machineInfo">
			<?php
				if ($tacheData["marqueMachine"] == null)
				{
					?>

					<p>Marque : Non renseigné</p>

					<?php
				}

				else
				{
					?>

					<p>Marque : <?php echo($tacheData["marqueMachine"])?></p>

					<?php
				}

				if ($tacheData["modeleMachine"] == null)
				{
					?>

					<p>Modèle : Non renseigné</p>

					<?php
				}

				else
				{
					?>

					<p>Modèle : <?php echo($tacheData["modeleMachine"])?></p>

					<?php
				}

				if ($tacheData["motDePasseMachine"] == null)
				{
					?>

					<p>Mot de passe : Non renseigné</p>

					<?php
				}

				else
				{
					?>

					<p>Mot de passe : <?php echo($tacheData["motDePasseMachine"])?></p>

					<?php
				}
			?>
		</div>
	</div>
</div>

<?php
	include("include/footer.php");
?>