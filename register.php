<?php
	$login = $_POST['user'];
	$password = $_POST['pass'];
	$repeat = $_POST['repeat'];
	if(IsSet($_POST['user'],$_POST['pass'],$_POST['repeat'])){
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
		$result = mysqli_query($connect, "SELECT * FROM pracownicy WHERE login='$login'"); 
		$rekord = mysqli_fetch_array($result);
		if(!$rekord){
			if ($password==$repeat){
				mysqli_query($connect,"INSERT INTO pracownicy (login,haslo) values ('$login','".md5($password)."')") or die(mysqli_error($connect));
				header("Location: login.html");
				exit;
			} else { echo 'hasła się nie zgadzają!<br><a href=/"rejestracja.html/">Wróć</a>';}
		} else {
			echo 'Takie konto już istnieje!<br><a href=/"rejestracja.html/">Wróć</a>';
		}
	}
?>