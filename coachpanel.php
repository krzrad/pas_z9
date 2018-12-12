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
		echo '<a href="lekcje.php">Lekcje</a><br>
		<a>Testy</a><br>
		<a>Wyniki</a><br>
		<a href="logout.php">Wyloguj</a>';
	} else echo 'Dostęp zablokowany<br>
	<a href="login.html">Wróć</a>';
	echo '</body></html>';
?>