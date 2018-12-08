<?php
	$login = $_POST['user'];
	$password = $_POST['pass'];
	if(IsSet($_POST['user'],$_POST['pass'])){
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
		$result = mysqli_query($connect, "SELECT * FROM szkoleniowcy WHERE login='$login'"); 
		$rekord = mysqli_fetch_array($result);
		if(!$rekord){
			mysqli_query($connect,"INSERT INTO szkoleniowcy (login,haslo) values ('$login','".md5($password)."')") or die(mysqli_error($connect));
			header("Location: admin.html");
		} else {
			echo 'Takie konto już istnieje!<br><a href=/"rejestracja.html/">Wróć</a>';
		}
	}
?>