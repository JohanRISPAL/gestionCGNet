<link rel="stylesheet" type="text/css" href="../css/clients.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="../js/clients.js"></script>

<?php
	include("include/header.php");
	include("include/menu.php");
	include("include/functions.php");

	$clientData = requestClientList();
?>

<h1> Liste des clients </h1>

<div class="globalContainer">
	<div class="searchBar">
		<label class="inputField">
			<input type="text" id="search" placeholder="&nbsp;">
			<span class="inputLabel">Recherche...</span>
			<span class="inputBorder"></span>
		</label>
		<input type="button" class="button" id="sendButton" value="Rechercher">
	</div>
	<div class="clientContainer">
		<?php
			if (count($clientData) == 0)
			{
				?>

				<div class="clientInfo">
					<p>Il n'y a aucun client stocké en base de données</p>
				</div>

				<?php
			}

			for($i = 0; $i < count($clientData); $i++)
			{
		?>
			<div class="clientInfo">
				<p>
					Nom : <a href="checkClient.php?idClient=<?php echo($clientData[$i]["idClient"]) ?>"><?php echo($clientData[$i]["nomClient"]) ?></a>
				</p>

				<?php
					if ($clientData[$i]["prenomClient"] == null)
					{
						?>

						<p>Prénom : Non renseigné</p>

						<?php
					}

					else
					{
						?>

						<p>Prénom : <?php echo($clientData[$i]["prenomClient"])?></p>

						<?php
					}

					if ($clientData[$i]["collectiviteClient"] == null)
					{
						?>

						<p>Collectivité : Non renseigné</p>

						<?php
					}

					else
					{
						?>

						<p>Collectivité : <?php echo($clientData[$i]["collectiviteClient"])?></p>

						<?php
					}
				?>

				<p>Numéro : <?php echo($clientData[$i]["numeroClient"])?></p>

				<?php
					if ($clientData[$i]["autreNumeroClient"] == null)
					{
						?>

						<p>Autre numéro : Non renseigné</p>

						<?php
					}

					else
					{
						?>

						<p>Autre numéro : <?php echo($clientData[$i]["autreNumeroClient"])?></p>

						<?php
					}

					if ($clientData[$i]["emailClient"] == null)
					{
						?>

						<p>E-mail : Non renseigné</p>

						<?php
					}

					else
					{
						?>

						<p>E-mail : <?php echo($clientData[$i]["emailClient"])?></p>

						<?php
					}
				?>
			</div>
		<?php
			}
		?>
		</div>
	</div>
<?php
	include("include/footer.php");
?>