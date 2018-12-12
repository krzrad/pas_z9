<?php
	session_start();
	$con = mysqli_connect(
		'sql.kradowskipas.nazwa.pl:3306',
		'kradowskipas_elearning',
		'Zadanie9',
		'kradowskipas_elearning'
	);
	if(!$con){
		echo "Błąd połączenia z MySQL!".PHP_EOL;
		echo "Err. no.: ".mysqli_connect_errno().PHP_EOL;
		echo "Error: ".mysqli_connect_error().PHP_EOL;
		exit;
	}
	if(isset($_POST['edit'])){
		if(!isset($_POST['l'])){
			mysqli_query($con,"SET NAMES utf8");
			mysqli_query($con,"INSERT INTO lekcje (ids,tytulLekcji,zawartosc) VALUES ('".$_SESSION["user"]."','".$_POST['tytul']."','".$_POST['edit']."')") 
			or die(mysqli_error($con));
		} else {
			mysqli_query($con,"SET NAMES utf8");
			mysqli_query($con,"UPDATE lekcje SET tytulLekcji = '".$_POST['tytul']."',zawartosc = '".$_POST['edit']."' WHERE idl = ".$_POST['l']."") 
			or die(mysqli_error($con));
		}
		header ("Location: lekcje.php");
	} else echo "nie odebrano danych :(";
	mysqli_close($con);
?>