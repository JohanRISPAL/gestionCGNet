<link rel="stylesheet" type="text/css" href="../css/checkClient.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="../js/checkClient.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<?php
	include("include/header.php");
	include("include/menu.php");
	include("include/functions.php");

	if (empty($_GET["idClient"]))
	{
		header("location: tasks.php");
	}

	else
	{
		$idClient = $_GET["idClient"];

		$clientData = requestClientData($idClient);
		$tacheData = requestClientTasks($idClient);

		if ($clientData == false)
		{
			header("location: tasks.php");
		}

		else
		{
			$clientData = $clientData[0];
		}
	}
?>

<h1>Profil client</h1>

<div class="globalContainer">
	<div class="clientContainer" id="<?php echo($clientData["idClient"])?>">
		<h2>Informations du client</h2>

		<label class="inputField">
			<input type="text" id="nomClient" placeholder="&nbsp;" value="<?php echo($clientData["nomClient"])?>">
			<span class="inputLabel">Nom*</span>
			<span class="inputBorder"></span>
		</label>

		<?php
			if ($clientData["prenomClient"] == null)
			{
				?>

				<label class="inputField">
					<input type="text" id="prenomClient" placeholder="&nbsp;">
					<span class="inputLabel">Prénom</span>
					<span class="inputBorder"></span>
				</label>

				<?php
			}

			else
			{
				?>

				<label class="inputField">
					<input type="text" id="prenomClient" placeholder="&nbsp;" value="<?php echo($clientData["prenomClient"])?>">
					<span class="inputLabel">Prénom</span>
					<span class="inputBorder"></span>
				</label>

				<?php
			}

			if ($clientData["collectiviteClient"] == null)
			{
				?>

				<label class="inputField">
					<input type="text" id="collectiviteClient" placeholder="&nbsp;">
					<span class="inputLabel">Collectivité</span>
					<span class="inputBorder"></span>
				</label>

				<?php
			}

			else
			{
				?>

				<label class="inputField">
					<input type="text" id="collectiviteClient" placeholder="&nbsp;" value="<?php echo($clientData["collectiviteClient"])?>">
					<span class="inputLabel">Collectivité</span>
					<span class="inputBorder"></span>
				</label>

				<?php
			}
		?>

		<label class="inputField">
			<input type="text" id="numeroClient" placeholder="&nbsp;" value="<?php echo($clientData["numeroClient"])?>">
			<span class="inputLabel">Numéro de téléphone*</span>
			<span class="inputBorder"></span>
		</label>

		<?php
			if ($clientData["autreNumeroClient"] == null)
			{
				?>

				<label class="inputField">
					<input type="text" id="autreNumeroClient" placeholder="&nbsp;">
					<span class="inputLabel">Numéro de téléphone 2</span>
					<span class="inputBorder"></span>
				</label>

				<?php
			}

			else
			{
				?>

				<label class="inputField">
					<input type="text" id="autreNumeroClient" placeholder="&nbsp;" value="<?php echo($clientData["autreNumeroClient"])?>">
					<span class="inputLabel">Numéro de téléphone 2</span>
					<span class="inputBorder"></span>
				</label>

				<?php
			}

			if ($clientData["emailClient"] == null)
			{
				?>

				<label class="inputField">
					<input type="text" id="emailClient" placeholder="&nbsp;">
					<span class="inputLabel">Adresse e-mail</span>
					<span class="inputBorder"></span>
				</label>

				<?php
			}

			else
			{
				?>

				<label class="inputField">
					<input type="text" id="emailClient" placeholder="&nbsp;" value="<?php echo($clientData["emailClient"])?>">
					<span class="inputLabel">Adresse e-mail</span>
					<span class="inputBorder"></span>
				</label>

				<?php
			}
		?>

		<div class="buttonContainer">
			<button class="button buttonModify">Enregister modifications</button>
		</div>
	</div>

	<div class="taskContainer">
		<h2>Tâches en rapport avec ce client</h2>

		<?php
			if ($tacheData == false)
			{
				?>

				<p>Aucune tâche n'est liée à ce client</p>

				<?php
			}

			else
			{
				?>

				<div class="taskInfoBorderTop"></div>

				<?php

				for ($i = 0; $i < count($tacheData); $i++)
				{
					?>

					<div class="taskInfo">
						<span>
							Intitulé : 
							<a href="checkTask.php?idTache=<?php echo($tacheData[$i]["idTache"]) ?>">
								<?php echo($tacheData[$i]["titreTache"]) ?>	
							</a>
						</span>
						
						<span>
							Date de début : <?php echo(date("d-m-Y", strtotime($tacheData[$i]["dateDebutTache"])))?>
						</span>
					</div>

					<?php
				} 
			}
		?>
	</div>
</div>

<?php
	include("include/footer.php");
?>