<link rel="stylesheet" type="text/css" href="../css/archives.css">

<?php
	include("include/header.php");
	include("include/menu.php");
	include("include/functions.php");
?>

<h1>Archives</h1>

<div class="taskList archivedTasks">
	<h2 class="archivedTasksHeader">Tâches archivées</h2>
	
	<?php
		$dataArchivedTask = requestArchivedTasks();

		if (!empty($dataArchivedTask))
		{
			?>

			<div class="taskHeader">
				<span class="taskHeaderObject1">Informations de la tâche</span>
				<span class="taskHeaderObject2">Informations du client</span>
				<span class="taskHeaderObject3">Informations de la machine</span>
			</div>

			<?php

			for ($i = 0; $i < count($dataArchivedTask); $i++)
			{
				?>

				<div class="taskDisplay">
					<div class="taskInfo">
						<p>
							<a href="checkTask.php?idTache=<?php echo($dataArchivedTask[$i]["idTache"]) ?>">
								<?php echo($dataArchivedTask[$i]["titreTache"]) ?>	
							</a>
							<span>
								<?php
									$dateDebutTache = strtotime($dataArchivedTask[$i]["dateDebutTache"]);
									echo(date("d-m-Y", $dateDebutTache));
								?>
							</span>
						</p>
					</div>


					<div class="clientInfo">
						<p>
							<a href="checkClient.php?idClient=<?php echo($dataArchivedTask[$i]["idClient"]) ?>">
								<?php echo($dataArchivedTask[$i]["nomClient"]) ?>
							</a>
							<span>
								<?php echo($dataArchivedTask[$i]["numeroClient"]) ?>
							</span>
						</p>
					</div>

					<div class="machineInfo">
						<?php
							if ($dataArchivedTask[$i]["idMachine"] == null)
							{
								?>

								<p>Cette tâche ne concerne pas de machine</p>

								<?php
							}

							else
							{
								?>

								<p><?php echo($dataArchivedTask[$i]["marqueMachine"]) ?></p>

								<?php
							}
						?>
					</div>
				</div>

				<?php
			}
		}

		else
		{
			?>

			<div class="taskHeaderEmpty">
				<p>Il n'y a aucune tâche archivée.</p>
			</div>

			<?php
		}
	?>

</div>

<?php
	include("include/footer.php");
?>