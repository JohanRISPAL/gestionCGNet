<link rel="stylesheet" type="text/css" href="../css/tasks.css">

<?php
	include("include/header.php");
	include("include/menu.php");
	include("include/functions.php");
?>

<h1>Tâches</h1>

<div class="taskList urgentTasks">
	<h2 class="urgentTasksHeader">Tâches urgentes</h2>
	
	<?php
		$dataUrgentTasks = requestUrgentTasks();

		if (!empty($dataUrgentTasks))
		{
			?>

			<div class="taskHeader">
				<span class="taskHeaderObject1">Informations de la tâche</span>
				<span class="taskHeaderObject2">Informations du client</span>
				<span class="taskHeaderObject3">Informations de la machine</span>
			</div>

			<?php

			for ($i = 0; $i < count($dataUrgentTasks); $i++)
			{
				?>

				<div class="taskDisplay">
					<div class="taskInfo">
						<p>
							<a href="checkTask.php?idTache=<?php echo($dataUrgentTasks[$i]["idTache"]) ?>">
								<?php echo($dataUrgentTasks[$i]["titreTache"]) ?>	
							</a>
							<span>
								<?php
									echo(date("d-m-Y", strtotime($dataUrgentTasks[$i]["dateDebutTache"])));
								?>
							</span>
						</p>
					</div>


					<div class="clientInfo">
						<p>
							<a href="checkClient.php?idClient=<?php echo($dataUrgentTasks[$i]["idClient"]) ?>">
								<?php echo($dataUrgentTasks[$i]["nomClient"]) ?>
							</a>
							<span>
								<?php echo($dataUrgentTasks[$i]["numeroClient"]) ?>
							</span>
						</p>
					</div>

					<div class="machineInfo">
						<?php
							if ($dataUrgentTasks[$i]["idMachine"] == null)
							{
								?>

								<p>Cette tâche ne concerne pas de machine</p>

								<?php
							}

							else
							{
								?>

								<p><?php echo($dataUrgentTasks[$i]["marqueMachine"]) ?></p>

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
				<p>Il n'y a aucune tâche urgente à accomplir.</p>
			</div>

			<?php
		}
	?>

</div>

<div class="taskList startedTasks">
	<h2 class="startedTasksHeader">Tâches en cours</h2>

	<?php
		$dataStartedTasks = requestStartedTasks();

		if (!empty($dataStartedTasks))
		{
			?>

			<div class="taskHeader">
				<span class="taskHeaderObject1">Informations de la tâche</span>
				<span class="taskHeaderObject2">Informations du client</span>
				<span class="taskHeaderObject3">Informations de la machine</span>
			</div>

			<?php

			for ($i = 0; $i < count($dataStartedTasks); $i++)
			{
				?>

				<div class="taskDisplay">
					<div class="taskInfo">
						<p>
							<a href="checkTask.php?idTache=<?php echo($dataStartedTasks[$i]["idTache"]) ?>">
								<?php echo($dataStartedTasks[$i]["titreTache"]) ?>	
							</a>
							<span>
								<?php
									echo(date("d-m-Y", strtotime($dataStartedTasks[$i]["dateDebutTache"])));
								?>
							</span>
						</p>
					</div>


					<div class="clientInfo">
						<p>
							<a href="checkClient.php?idClient=<?php echo($dataStartedTasks[$i]["idClient"]) ?>">
								<?php echo($dataStartedTasks[$i]["nomClient"]) ?>
							</a>
							<span>
								<?php echo($dataStartedTasks[$i]["numeroClient"]) ?>
							</span>
						</p>
					</div>

					<div class="machineInfo">
						<?php
							if ($dataStartedTasks[$i]["idMachine"] == null)
							{
								?>

								<p>Cette tâche ne concerne pas de machine</p>

								<?php
							}

							else
							{
								?>

								<p><?php echo($dataStartedTasks[$i]["marqueMachine"]) ?></p>

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
				<p>Il n'y a aucune tâche en cours.</p>
			</div>

			<?php
		}
	?>
	
</div>

<div class="taskList toDoTasks">
	<h2 class="toDoTasksHeader">Tâches en attente</h2>

	<?php
		$dataToDoTasks = requestToDoTasks();

		if (!empty($dataToDoTasks))
		{
			?>

			<div class="taskHeader">
				<span class="taskHeaderObject1">Informations de la tâche</span>
				<span class="taskHeaderObject2">Informations du client</span>
				<span class="taskHeaderObject3">Informations de la machine</span>
			</div>

			<?php

			for ($i = 0; $i < count($dataToDoTasks); $i++)
			{
				?>

				<div class="taskDisplay">
					<div class="taskInfo">
						<p>
							<a href="checkTask.php?idTache=<?php echo($dataToDoTasks[$i]["idTache"]) ?>">
								<?php echo($dataToDoTasks[$i]["titreTache"]) ?>	
							</a>
							<span>
								<?php
									echo(date("d-m-Y", strtotime($dataToDoTasks[$i]["dateDebutTache"])));
								?>
							</span>
						</p>
					</div>

					<div class="clientInfo">
						<p>
							<a href="checkClient.php?idClient=<?php echo($dataToDoTasks[$i]["idClient"]) ?>">
								<?php echo($dataToDoTasks[$i]["nomClient"]) ?>
							</a>
							<span>
								<?php echo($dataToDoTasks[$i]["numeroClient"]) ?>
							</span>
						</p>
					</div>

					<div class="machineInfo">
						<?php
							if ($dataToDoTasks[$i]["idMachine"] == null)
							{
								?>

								<p>Aucune machine</p>

								<?php
							}

							else
							{
								?>

								<p><?php echo($dataToDoTasks[$i]["marqueMachine"]) ?></p>

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
				<p>Il n'y a aucune tâche en attente.</p>
			</div>

			<?php
		}
	?>
	
</div>

<?php
	include("include/footer.php");
?>