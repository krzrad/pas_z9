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
	if($_SESSION["group"] == 'coach'){
		echo "<form method=\"post\" action=\"tworz_pytania.php\">
			Nazwa testu: <input type=\"text\" name=\"tytul\"/>
			<input type=\"submit\" value=\"Dalej\">
		</form><a href=\"testy.php\">";
	} else echo 'Dostęp zablokowany<br><a href="login.html">';
	echo 'Wróć</a></body></html>';
?>