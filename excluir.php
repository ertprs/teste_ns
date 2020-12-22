<?php
require('validacao.php');
$id = $_GET['id'];
$horario = $_GET['horario'];

if ($id != '') {
	$id = isset( $_GET['id'] ) ? $_GET['id'] : '';
	$db = isset( $_GET['db'] ) ? $_GET['db'] : '';

	$sql = mysqli_query($con, "DELETE FROM $db WHERE id = '$id'");

}else if ($horario != '') {
	$horario = isset( $_GET['horario'] ) ? $_GET['horario'] : '';
	$db = isset( $_GET['db'] ) ? $_GET['db'] : '';

	$sql = mysqli_query($conecta, "DELETE FROM $db WHERE horario = '$horario'");

}else if ($id != '' and $horario != '') {
	$id = isset( $_GET['id'] ) ? $_GET['id'] : '';
	$db = isset( $_GET['db'] ) ? $_GET['db'] : '';

	$sql = mysqli_query($conecta, "DELETE FROM $db WHERE id = '$id'");

}else{
	$id = isset( $_GET['id'] ) ? $_GET['id'] : '';
	$db = isset( $_GET['db'] ) ? $_GET['db'] : '';

	$sql = mysqli_query($con, "DELETE FROM $db WHERE id = '$id'");
}


echo "<script>		
history.back();
</script>";
die;

?>