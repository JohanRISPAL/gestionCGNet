<?php
	include("../php/include/functions.php");

	if (!empty($_POST["changeUrgent"]))
	{
		$value = $_POST["changeUrgent"] - 1;
		$idTache = $_POST["idTache"];

		updateTaskUrgency($value, $idTache);
	}

	if (!empty($_POST["changeNotesCoutAndPrix"]))
	{
		if (!empty($_POST["notesTache"]))
		{
			$notesTache = $_POST["notesTache"];
		}

		else
		{
			$notesTache = null;
		}

		if (!empty($_POST["coutTache"]))
		{
			$coutTache = $_POST["coutTache"];
		}
		
		else
		{
			$coutTache = null;
		}

		if (!empty($_POST["prixTache"]))
		{
			$prixTache = $_POST["prixTache"];
		}

		else
		{
			$prixTache = null;
		}

		$idTache = $_POST["idTache"];

		updateTaskNotesCostAndPrice($notesTache, $coutTache, $prixTache, $idTache);
	}

	if (!empty($_POST["startTask"]))
	{
		$idTache = $_POST["idTache"];

		updateTaskStartTask($idTache);
	}

	if (!empty($_POST["stopTask"]))
	{
		$idTache = $_POST["idTache"];

		updateTaskStopTask($idTache);
	}

	if (!empty($_POST["finishTask"]))
	{
		$idTache = $_POST["idTache"];

		updateTaskFinishTask($idTache);
	}

	if (!empty($_POST["restartTask"]))
	{
		$idTache = $_POST["idTache"];

		updateTaskRestartTask($idTache);
	}
?>