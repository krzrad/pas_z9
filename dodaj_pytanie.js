function dodajPytanie(){
	if($('#pytania').is(':empty')){
		$("#pytania").append("<input type=\"text\" name=\"tresc\"/><br>")
		.append("<p>A) <input type=\"text\" name=\"a\"/><input type=\"checkbox\" name=\"a_true\"></p><br>")
		.append("<p>B) <input type=\"text\" name=\"b\"/><input type=\"checkbox\" name=\"b_true\"></p><br>")
		.append("<p>C) <input type=\"text\" name=\"c\"/><input type=\"checkbox\" name=\"c_true\"></p><br>")
		.append("<p>D) <input type=\"text\" name=\"d\"/><input type=\"checkbox\" name=\"d_true\"></p><br>")
		.append("<p>Obrazek: <input type=\"file\" name=\"obrazek\"></p></br>");
	} else {
		$.post("bla.php",null);
	}
}