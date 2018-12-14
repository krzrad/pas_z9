<?php 
	session_start();
	echo '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
	<head>
		<title>Radowski</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<BODY>';
	if($_SESSION["group"] == 'worker'){
		echo '<a href="lekcje.php">Lekcje</a><br>
		<a href="testy.php">Testy</a><br>
		<a href="wyniki.php">Wyniki</a><br>
		<a href="logout.php">Wyloguj</a>';
	} else echo 'Dostęp zablokowany<br>
	<a href="login.html">Wróć</a>';
	echo '</body></html>';
?>