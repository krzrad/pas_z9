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
		echo '<div class="col-s-1 col-2">';
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
		$result = mysqli_query($connect, "SELECT * FROM test WHERE ids='".$_SESSION["user"]."'");
		if(mysqli_num_rows($result)){
			while ($row=mysqli_fetch_array($result))
			echo '<a href="edytujTest.php?l='.$row['idt'].'">'.$row['nazwa'].'</a><br>';
		} else {
			echo 'Brak testów!<br>';
		}
		echo '<a href="nowy_test.php">Utwórz nowy test</a><br>
		</div>
		<div class="col-s-1 col-8">
			dd
		</div>
		</div><a href="coachpanel.php">';
	} else if($_SESSION["group"] == 'worker') {
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
		$result = mysqli_query($connect, "SELECT * FROM test");
		if(mysqli_num_rows($result)){
			echo '<div class="col-s-1 col-2">';
			while ($row=mysqli_fetch_array($result))
			echo '<a href="rozwiaz.php?l='.$row['idt'].'">'.$row['tytulLekcji'].'</a><br>';
		} else {
			echo 'Brak testów!<br>';
		}
		echo '<br>
		</div>
		<div class="col-s-1 col-8">
			dd
		</div>
		</div><a href="userpanel.php">';
	} else echo 'Dostęp zablokowany<br><a href="login.html">';
	echo 'Wróć</a></body></html>';
?>