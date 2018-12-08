<? 
	session_start();
	if($_SESSION["group"] == 'coach'){
		echo '<button>Lekcje</button><br>
		<button>Testy</button><br>
		<button>Wyniki</button><br>
		<a href="logout.php">Wyloguj</a>';
	} else echo "Dostęp zablokowany";
?>