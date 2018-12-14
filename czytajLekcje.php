<?php
	session_start();
	echo '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
	<head>
		<title>Radowski</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="style.css">
		<script src="./ckeditor/ckeditor.js"></script>
	</head>
	<BODY>';
	if($_SESSION["group"] == 'worker'){
		$l=$_GET['l'];
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
		$result=mysqli_query($connect, "SELECT * FROM lekcje WHERE idl='".$l."'");
		$row=mysqli_fetch_array($result);
		echo "<h1>".$row['tytulLekcji']."</h1>".$row['zawartosc']."<a href=\"lekcje.php\">";
	} else echo 'Dostęp zablokowany<br><a href="login.html">';
	echo 'Wróć</a></body></html>';
?>