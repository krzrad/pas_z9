<?php
	$login = $_POST['user'];
	$password = md5($_POST['pass']);
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
		$result = mysqli_query($connect, "SELECT * FROM pracownicy WHERE login='$login'"); 
		$rekord = mysqli_fetch_array($result);
		if($rekord and $rekord['haslo']==$password){
			session_start();
			$_SESSION["user"] = $id;
			$_SESSION["group"] = "worker";
			header("Location: userpanel.php");
		} else {
			$result = mysqli_query($connect, "SELECT * FROM szkoleniowcy WHERE login='$login'");
			$rekord = mysqli_fetch_array($result);
			if($rekord and $rekord['haslo']==$password){
				session_start();
				$_SESSION["user"] = $id;
				if($login=="admin") {
					$_SESSION["group"] = "admin";
					header("Location: admin.html");
				} else {
					$_SESSION["group"] = "coach";
					header("Location: coachpanel.php");
				}
			} else {
				echo 'Dane logowania nieprawidłowe!<br><a href="login.html">Wróć</a>';
			}
		}
		mysqli_close($connect);
	}
?>