<html>

<head>
	<title>Aprendendo PHP</title>
</head>

<body>

	<?php
	echo "Data: " . date("d/m/Y");

	echo "<br/>" . date("F");

	echo "<br/><br/>";

	echo "Hora: " . date("H:i:s");

	echo "<br/>----------------------------------------<br/>";


	// Pega as informacoes de uma data, neste caso está recebendo a data atual do sistema 
	// na forma de array e atribuindo ao array $data.
	$data = getdate();

	print_r($data); //imprime o array completo

	echo "<br/><br/>";

	echo "<br/>Horas: " . $data["hours"];
	echo "<br/>Minutos: " . $data["minutes"];
	echo "<br/>Segundos: " . $data["seconds"];
	?>

</body>

</html>