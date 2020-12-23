<?php
$con = mysqli_connect("", "root", "", "rafacoel_ns") or die(mysqli_error($con));

mysqli_query($con,"SET NAMES 'utf8'");
mysqli_query($con,'SET character_set_connection=utf8');
mysqli_query($con,'SET character_set_client=utf8');
mysqli_query($con,'SET character_set_results=utf8');
date_default_timezone_set('America/Sao_Paulo');
?>