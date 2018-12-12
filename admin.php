<? 
	session_start();
	if($_SESSION["group"] == 'admin'){
		echo '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
			<head>
				<title>Radowski</title>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
				<link rel="stylesheet" type="text/css" href="style.css">
			</head>
			<BODY>
			Formularz rejestracji szkoleniowca
			<form method="post" action="registerCoach.php">
				Login:<input type="text" name="user" maxlength="20" size="20"><br>
				Hasło:<input type="password" name="pass" maxlength="20" size="20"><br>
				<input type="submit" value="Zarejestruj"/>
				<a href="logout.php">Wyloguj</a>
			</BODY>
			</HTML>';
	} else echo "Dostęp zablokowany";
?>