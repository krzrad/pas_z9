<?php
	session_start();
	echo '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
	<head>
		<title>Radowski</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<BODY>';
	if($_SESSION["group"] == 'coach'){
		echo '<div class="row">';
		$DBhost = 'sql.kradowskipas.nazwa.pl:3306';
		$DBuser = 'kradowskipas_elearning';
		$DBpassword ='Zadanie9';
		$DBname = 'kradowskipas_elearning';
		$connect = mysqli_connect($DBhost,$DBuser,$DBpassword,$DBname);
		if(!$connect){
			echo "Błąd połączenia z MySQL!".PHP_EOL;
			echo "Err. no.: ".mysqli_connect_errno().PHP_EOL;
			echo "Error: ".mysqli_connect_error().PHP_EOL;
			exit;
		};
		$result = mysqli_query($connect, "SELECT * FROM lekcje WHERE ids='".$_SESSION["user"]."'");
		if(mysqli_num_rows($result)){
			echo '<div class="col-s-1 col-2">';
			while ($row=mysqli_fetch_array($result))
			echo '<a href="edytujLekcje.php?l='.$row['idl'].'">'.$row['tytulLekcji'].'</a><br>';
		} else {
			echo 'Brak lekcji!<br>';
		}
		echo '<a href="nowa_lekcja.php">Utwórz nową lekcję</a><br>
		</div>
		<div class="col-s-1 col-8">
			edytor
		</div>
		</div><a href="coachpanel.php">';
	} else echo 'Dostęp zablokowany<br><a href="login.html">';
	echo 'Wróć</a></body></html>';
?>