<?php
	function createDBAccess()
	{
		return new PDO('mysql:host=localhost;dbname=GestionTaches;charset=UTF8', 'root' , 'root');
	}

	function requestUrgentTasks()
	{
		$bdd = createDBAccess();

		$queryUrgentTasks = $bdd->prepare("SELECT Tache.idTache, Tache.titreTache, Tache.dateDebutTache, Client.idClient, Client.nomClient, Client.numeroClient, Machine.idMachine, Machine.marqueMachine FROM Tache INNER JOIN Client ON Tache.idClient = Client.idClient LEFT JOIN Machine On Tache.idMachine = Machine.idMachine WHERE Tache.isUrgent = 1 AND Tache.isDone = 0 ORDER BY Tache.dateDebutTache DESC");
		$queryUrgentTasks->execute();

		return $queryUrgentTasks->fetchAll();
	}

	function requestStartedTasks()
	{
		$bdd = createDBAccess();

		$queryStartedTasks = $bdd->prepare("SELECT Tache.idTache, Tache.titreTache, Tache.dateDebutTache, Client.idClient, Client.nomClient, Client.numeroClient, Machine.idMachine, Machine.marqueMachine FROM Tache INNER JOIN Client ON Tache.idClient = Client.idClient LEFT JOIN Machine On Tache.idMachine = Machine.idMachine WHERE Tache.isUrgent = 0 AND Tache.isStarted = 1 AND Tache.isDone = 0 ORDER BY Tache.dateDebutTache DESC");
		$queryStartedTasks->execute();

		return $queryStartedTasks->fetchAll();
	}

	function requestToDoTasks()
	{
		$bdd = createDBAccess();

		$queryToDoTasks = $bdd->prepare("SELECT Tache.idTache, Tache.titreTache, Tache.dateDebutTache, Client.idClient, Client.nomClient, Client.numeroClient, Machine.idMachine, Machine.marqueMachine FROM Tache INNER JOIN Client ON Tache.idClient = Client.idClient LEFT JOIN Machine On Tache.idMachine = Machine.idMachine WHERE Tache.isUrgent = 0 AND Tache.isStarted = 0 AND Tache.isDone = 0 ORDER BY Tache.dateDebutTache DESC");
		$queryToDoTasks->execute();

		return $queryToDoTasks->fetchAll();
	}

	function requestArchivedTasks()
	{
		$bdd = createDBAccess();

		$queryArchivedTasks = $bdd->prepare("SELECT Tache.idTache, Tache.titreTache, Tache.dateDebutTache, Client.idClient, Client.nomClient, Client.numeroClient, Machine.idMachine, Machine.marqueMachine FROM Tache INNER JOIN Client ON Tache.idClient = Client.idClient LEFT JOIN Machine On Tache.idMachine = Machine.idMachine WHERE Tache.isDone = 1 ORDER BY Tache.dateDebutTache DESC");
		$queryArchivedTasks->execute();

		return $queryArchivedTasks->fetchAll();
	}

	function processClient($nomClient, $prenomClient, $collectiviteClient, $numeroClient, $autreNumeroClient, $emailClient)
	{
		$bdd = createDBAccess();

		$queryClientExists = $bdd->prepare("SELECT * FROM Client WHERE nomClient = ? AND numeroClient = ?");
		$queryClientExists->execute([$nomClient, $numeroClient]);
		$dataClientExists = $queryClientExists->fetchAll();

		$clientsFound = count($dataClientExists);

		if ($clientsFound > 1)
		{
			for ($i = 0; $i < $clientsFound - 1; $i++)
			{
				$queryDeleteOldestClients = $bdd->prepare("DELETE FROM Client WHERE idClient = ?");
				$queryDeleteOldestClients->execute([$dataClientExists[$i]["idClient"]]);
			}

			$arrayPlace = $i + 1;

			if ($prenomClient != $dataClientExists[$arrayPlace]["prenomClient"] && $prenomClient != null);
			{
				updatePrenomClient($dataClientExists[$arrayPlace]["idClient"], $prenomClient);
			}

			if ($collectiviteClient != $dataClientExists[$arrayPlace]["collectiviteClient"] && $collectiviteClient != null);
			{
				updateCollectiviteClient($dataClientExists[$arrayPlace]["idClient"], $collectiviteClient);
			}

			if ($autreNumeroClient != $dataClientExists[$arrayPlace]["autreNumeroClient"] && $autreNumeroClient != null);
			{
				updateAutreNumeroClient($dataClientExists[$arrayPlace]["idClient"], $autreNumeroClient);
			}

			if ($emailClient != $dataClientExists[$arrayPlace]["emailClient"] && $emailClient != null);
			{
				updateEmailClient($dataClientExists[$arrayPlace]["idClient"], $emailClient);
			}

			return $dataClientExists[$arrayPlace]["idClient"];
		}

		else if ($clientsFound == 1)
		{
			if ($prenomClient != $dataClientExists[0]["prenomClient"] && $prenomClient != null);
			{
				updatePrenomClient($dataClientExists[0]["idClient"], $prenomClient);
			}

			if ($collectiviteClient != $dataClientExists[0]["collectiviteClient"] && $collectiviteClient != null);
			{
				updateCollectiviteClient($dataClientExists[0]["idClient"], $collectiviteClient);
			}

			if ($autreNumeroClient != $dataClientExists[0]["autreNumeroClient"] && $autreNumeroClient != null);
			{
				updateAutreNumeroClient($dataClientExists[0]["idClient"], $autreNumeroClient);
			}

			if ($emailClient != $dataClientExists[0]["emailClient"] && $emailClient != null);
			{
				updateEmailClient($dataClientExists[0]["idClient"], $emailClient);
			}

			return $dataClientExists[0]["idClient"];
		}

		else
		{
			return (insertClient($nomClient, $prenomClient, $collectiviteClient, $numeroClient, $autreNumeroClient, $emailClient));
		}
	}

	function updatePrenomClient($idClient, $prenomClient)
	{
		$bdd = createDBAccess();

		$queryUpdatePrenomClient = $bdd->prepare("UPDATE Client SET prenomClient = ? WHERE idClient = ?");
		$queryUpdatePrenomClient->execute([$prenomClient, $idClient]);
	}

	function updateCollectiviteClient($idClient, $collectiviteClient)
	{
		$bdd = createDBAccess();

		$queryUpdateCollectiviteClient = $bdd->prepare("UPDATE Client SET collectiviteClient = ? WHERE idClient = ?");
		$queryUpdateCollectiviteClient->execute([$collectiviteClient, $idClient]);
	}

	function updateAutreNumeroClient($idClient, $autreNumeroClient)
	{
		$bdd = createDBAccess();

		$queryUpdateAutreNumeroClient = $bdd->prepare("UPDATE Client SET autreNumeroClient = ? WHERE idClient = ?");
		$queryUpdateAutreNumeroClient->execute([$autreNumeroClient, $idClient]);
	}

	function updateEmailClient($idClient, $emailClient)
	{
		$bdd = createDBAccess();

		$queryUpdateEmailClient = $bdd->prepare("UPDATE Client SET emailClient = ? WHERE idClient = ?");
		$queryUpdateEmailClient->execute([$emailClient, $idClient]);
	}

	function insertClient($nomClient, $prenomClient, $collectiviteClient, $numeroClient, $autreNumeroClient, $emailClient)
	{
		$bdd = createDBAccess();

		$queryInsertClient = $bdd->prepare("INSERT INTO Client (nomClient, prenomClient, collectiviteClient, numeroClient, autreNumeroClient, emailClient) VALUES (?, ?, ?, ?, ?, ?)");
		$queryInsertClient->execute([$nomClient, $prenomClient, $collectiviteClient, $numeroClient, $autreNumeroClient, $emailClient]);

		$queryClientID = $bdd->prepare("SELECT LAST_INSERT_ID() AS idClient");
		$queryClientID->execute();

		$dataClientID = $queryClientID->fetch();

		return($dataClientID["idClient"]);
	}

	function processMachine($marqueMachine, $modeleMachine, $motDePasseMachine)
	{
		$bdd = createDBAccess();

		$queryInsertMachine = $bdd->prepare("INSERT INTO Machine (marqueMachine, modeleMachine, motDePasseMachine) VALUES (?, ?, ?)");
		$queryInsertMachine->execute([$marqueMachine, $modeleMachine, $motDePasseMachine]);

		$queryMachineID = $bdd->prepare("SELECT LAST_INSERT_ID() AS idMachine");
		$queryMachineID->execute();

		$dataMachineID = $queryMachineID->fetch();

		return($dataMachineID["idMachine"]);
	}

	function processTache($titreTache, $descriptionTache, $notesTache, $dateDebutTache, $isUrgent, $idClient, $idMachine)
	{
		$bdd = createDBAccess();

		$queryInsertTache = $bdd->prepare("INSERT INTO Tache (titreTache, descriptionTache, notesTache, dateDebutTache, isUrgent, isStarted, isDone, idClient, idMachine) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$queryInsertTache->execute([$titreTache, $descriptionTache, $notesTache, $dateDebutTache, $isUrgent, 0, 0, $idClient, $idMachine]);

		return true;
	}

	function requestTacheData($idTache)
	{
		$bdd = createDBAccess();

		$queryTacheData = $bdd->prepare("SELECT * FROM Tache INNER JOIN Client ON Tache.idClient = Client.idClient LEFT JOIN Machine ON Tache.idMachine = Machine.idMachine WHERE Tache.idTache = ?");
		$queryTacheData->execute([$idTache]);

		$tacheData = $queryTacheData->fetchAll();

		if (count($tacheData) == 1)
		{
			return $tacheData;
		}

		else
		{
			return false;
		}
	}

	function updateTaskUrgency($value, $idTache)
	{
		$bdd = createDBAccess();

		$queryUpdateTacheUrgency = $bdd->prepare("UPDATE Tache SET isUrgent = ? WHERE idTache = ?");
		$queryUpdateTacheUrgency->execute([$value, $idTache]);
	}

	function updateTaskNotesCostAndPrice($notesTache, $coutTache, $prixTache, $idTache)
	{
		$bdd = createDBAccess();

		$queryUpdateTacheNotesCostAndPrice = $bdd->prepare("UPDATE Tache SET notesTache = ?, coutTache = ?, prixTache = ? WHERE idTache = ?");
		$queryUpdateTacheNotesCostAndPrice->execute([$notesTache, $coutTache, $prixTache, $idTache]);
	}

	function updateTaskStartTask($idTache)
	{
		$bdd = createDBAccess();

		$queryUpdateStartTache = $bdd->prepare("UPDATE Tache SET isStarted = 1 WHERE idTache = ?");
		$queryUpdateStartTache->execute([$idTache]);
	}

	function updateTaskStopTask($idTache)
	{
		$bdd = createDBAccess();

		$queryUpdateStopTache = $bdd->prepare("UPDATE Tache SET isStarted = 0 WHERE idTache = ?");
		$queryUpdateStopTache->execute([$idTache]);
	}

	function updateTaskFinishTask($idTache)
	{
		$bdd = createDBAccess();

		date_default_timezone_set("Europe/Paris");

		$queryUpdateFinishTask = $bdd->prepare("UPDATE Tache SET isStarted = 0, isDone = 1, dateFinTache = ? WHERE idTache = ?");
		$queryUpdateFinishTask->execute([date("Y-m-d"), $idTache]);
	}

	function updateTaskRestartTask($idTache)
	{
		$bdd = createDBAccess();

		$queryUpdateRestartTask = $bdd->prepare("UPDATE Tache SET isDone = 0, dateFinTache = null WHERE idTache = ?");
		$queryUpdateRestartTask->execute([$idTache]);
	}

	function requestClientList()
	{
		$bdd = createDBAccess();

		$queryClientList = $bdd->prepare("SELECT * FROM Client ORDER BY nomClient ASC");
		$queryClientList->execute();

		return $queryClientList->fetchAll();
	}

	function requestClientData($idClient)
	{
		$bdd = createDBAccess();

		$queryClientData = $bdd->prepare("SELECT * FROM Client WHERE Client.idClient = ?");
		$queryClientData->execute([$idClient]);

		$clientData = $queryClientData->fetchAll();

		if (count($clientData) == 1)
		{
			return $clientData;
		}

		else
		{
			return false;
		}
	}

	function requestClientTasks($idClient)
	{
		$bdd = createDBAccess();

		$queryClientData = $bdd->prepare("SELECT * FROM Tache WHERE Tache.idClient = ? ORDER BY dateDebutTache DESC");
		$queryClientData->execute([$idClient]);

		$clientData = $queryClientData->fetchAll();

		if (count($clientData) > 0)
		{
			return $clientData;
		}

		else
		{
			return false;
		}
	}

	function updateClientData($nomClient, $prenomClient, $collectiviteClient, $numeroClient, $autreNumeroClient, $emailClient, $idClient)
	{
		$bdd = createDBAccess();

		$queryUpdateClientData = $bdd->prepare("UPDATE Client SET nomClient = ?, prenomClient = ?, collectiviteClient = ?, numeroClient = ?, autreNumeroClient = ?, emailClient= ? WHERE idClient = ?");
		$queryUpdateClientData->execute([$nomClient, $prenomClient, $collectiviteClient, $numeroClient, $autreNumeroClient, $emailClient, $idClient]);
	}

	function searchClient($toSearch)
	{
		$bdd = createDBAccess();

		$querySearchClient = $bdd->prepare("SELECT * FROM Client WHERE nomClient LIKE ? OR numeroClient = ? ORDER BY nomClient ASC");
		$querySearchClient->execute([$toSearch, $toSearch]);

		return $querySearchClient->fetchAll();
	}
?>