<?php
	include("../php/include/functions.php");
	
	if (!empty($_POST["isPosted"]))
	{
		date_default_timezone_set("Europe/Paris");

		$nomClient = $_POST["nomClient"];
		$prenomClient = $_POST["prenomClient"];
		$collectiviteClient = $_POST["collectiviteClient"];
		$numeroClient = $_POST["numeroClient"];
		$autreNumeroClient = $_POST["autreNumeroClient"];
		$emailClient = $_POST["emailClient"];

		$titreTache = $_POST["titreTache"];
		$descriptionTache = $_POST["descriptionTache"];
		$notesTache = $_POST["notesTache"];
		$dateDebutTache = date("Y-m-d H:i:s");
		$isUrgent = $_POST["isUrgent"];

		$idClient = processClient($nomClient, $prenomClient, $collectiviteClient, $numeroClient, $autreNumeroClient, $emailClient);

		if (!empty($_POST["marqueMachine"]) || !empty($_POST["modeleMachine"]) || !empty($_POST["motDePasseMachine"]))
		{
			$marqueMachine = $_POST["marqueMachine"];
			$modeleMachine = $_POST["modeleMachine"];
			$motDePasseMachine = $_POST["motDePasseMachine"];

			$idMachine = processMachine($marqueMachine, $modeleMachine, $motDePasseMachine);

			processTache($titreTache, $descriptionTache, $notesTache, $dateDebutTache, $isUrgent, $idClient, $idMachine);
		}

		else
		{
			processTache($titreTache, $descriptionTache, $notesTache, $dateDebutTache, $isUrgent, $idClient, null);
		}
	}
?>