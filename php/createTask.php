<link rel="stylesheet" type="text/css" href="../css/createTask.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="../js/createTask.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<?php
	include("include/header.php");
	include("include/menu.php");
	include("include/functions.php");
?>

<h1>Création de tâche</h1>

<div class="globalContainer">
	<div class="clientContainer container">
		<h2>Informations client</h2>

		<label class="inputField">
			<input type="text" id="nomClient" placeholder="&nbsp;">
			<span class="inputLabel">Nom*</span>
			<span class="inputBorder"></span>
		</label>

		<label class="inputField">
			<input type="text" id="prenomClient" placeholder="&nbsp;">
			<span class="inputLabel">Prénom</span>
			<span class="inputBorder"></span>
		</label>

		<label class="inputField">
			<input type="text" id="collectiviteClient" placeholder="&nbsp;">
			<span class="inputLabel">Collectivité</span>
			<span class="inputBorder"></span>
		</label>

		<label class="inputField">
			<input type="number" id="numeroClient" placeholder="&nbsp;">
			<span class="inputLabel">Numéro de téléphone*</span>
			<span class="inputBorder"></span>
		</label>

		<label class="inputField">
			<input type="number" id="autreNumeroClient" placeholder="&nbsp;">
			<span class="inputLabel">Numéro de téléphone 2</span>
			<span class="inputBorder"></span>
		</label>

		<label class="inputField">
			<input type="text" id="emailClient" placeholder="&nbsp;">
			<span class="inputLabel">Adresse e-mail</span>
			<span class="inputBorder"></span>
		</label>
	</div>

	<div class="machineContainer container">
		<h2>Informations machine</h2>

		<label class="inputField">
			<input type="text" id="marqueMachine" placeholder="&nbsp;">
			<span class="inputLabel">Marque de la machine</span>
			<span class="inputBorder"></span>
		</label>

		<label class="inputField">
			<input type="text" id="modeleMachine" placeholder="&nbsp;">
			<span class="inputLabel">Modele de la machine</span>
			<span class="inputBorder"></span>
		</label>

		<label class="inputField">
			<input type="text" id="motDePasseMachine" placeholder="&nbsp;">
			<span class="inputLabel">Mot de passe</span>
			<span class="inputBorder"></span>
		</label>

		<span>Saisir un champ est nécessaire pour sauvegarder une machine.</span>
	</div>

	<div class="taskContainer container">
		<h2>Informations de la tâche</h2>

		<label class="inputField">
			<input type="text" id="titreTache" placeholder="&nbsp;">
			<span class="inputLabel">Intitulé de la tâche*</span>
			<span class="inputBorder"></span>
		</label>

		<textarea id="descriptionTache" placeholder="Description de la tâche" rows="6" cols="60"></textarea>

		<textarea id="notesTache" placeholder="Notes" rows="8" cols="60"></textarea>

		<div class="switchContainer">
			<span>Normale</span>
			<label class="switch">
				<input type="checkbox" id="isUrgent">
				<span class="slider round"></span>
			</label>
			<span>Urgente</span>
		</div>
	</div>

	<div class="container">
		<input type="submit" class="submitButton" value="Créer une tâche">
	</div>
</div>

<?php
	include("include/footer.php");
?>