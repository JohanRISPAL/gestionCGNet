<?php
	include("../php/include/functions.php");

	if (!empty($_POST["updateClient"]))
	{
		$nomClient = $_POST["nomClient"];

		if (!empty($_POST["prenomClient"]))
		{
			$prenomClient = $_POST["prenomClient"];
		}

		else
		{
			$prenomClient = null;
		}

		if (!empty($_POST["collectiviteClient"]))
		{
			$collectiviteClient = $_POST["collectiviteClient"];
		}

		else
		{
			$collectiviteClient = null;
		}

		$numeroClient = $_POST["numeroClient"];

		if (!empty($_POST["autreNumeroClient"]))
		{
			$autreNumeroClient = $_POST["autreNumeroClient"];
		}

		else
		{
			$autreNumeroClient = null;
		}

		if (!empty($_POST["emailClient"]))
		{
			$emailClient = $_POST["emailClient"];
		}

		else
		{
			$emailClient = null;
		}

		$idClient = $_POST["idClient"];

		updateClientData($nomClient, $prenomClient, $collectiviteClient, $numeroClient, $autreNumeroClient, $emailClient, $idClient);
	}
?>