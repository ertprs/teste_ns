<?php
		$con = mysqli_connect("162.241.40.112","limonsist","NewL1m40L0nd0n$","limonsis_hcnew") or die(mysqli_error($con));

		mysqli_query($con,"SET NAMES 'utf8'");
		mysqli_query($con,'SET character_set_connection=utf8');
		mysqli_query($con,'SET character_set_client=utf8');
		mysqli_query($con,'SET character_set_results=utf8');
	
?>