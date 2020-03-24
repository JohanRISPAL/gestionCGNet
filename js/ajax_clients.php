<?php
	include("../php/include/functions.php");

	if (!empty($_POST["search"]))
	{
		$toSearch = $_POST["toSearch"];

		if ($toSearch == "")
		{
			echo json_encode(requestClientList());
		}

		else
		{
			echo json_encode(searchClient($toSearch));
		}
	}
?>