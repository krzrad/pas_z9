<?php
	session_start();
	echo '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
	<head>
		<title>Radowski</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="style.css">
		<script src="./dodaj_pytanie.js"></script>
		<script src="./ckeditor/ckeditor.js"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	</head>
	<BODY>';
	if($_SESSION["group"] == 'coach'){
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
		mysqli_query($connect,"INSERT INTO test (ids,nazwa) VALUES ('".$_SESSION["user"]."','".$_POST['tytul']."')") or die(mysqli_error($connect));
		echo "<form method=\"post\" action=\"zapisz_test.php\">
			<div id=\"pytania\"></div>
			<button type=\"button\" onclick=\"dodajPytanie()\">Dodaj pytanie</button>
			<input type=\"submit\" value=\"Zapisz\"/>
		</form><a href=\"testy.php\">";
	} else echo 'Dostęp zablokowany<br><a href="login.html">';
	echo 'Wróć</a></body></html>';
?>