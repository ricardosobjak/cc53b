<style type="text/css">
	.quadroBranco,
	.quadroPreto {
		float: left;
		display: block;
		width: 50px;
		height: 50px;
	}

	.quadroBranco {
		background-color: #FFC;
	}

	.quadroPreto {
		background-color: #333;
	}

	.primeiro {
		clear: left;
	}
</style>

<?php
$flag = 1;
for ($i = 0; $i <= 8; $i++) {

	for ($j = 0; $j <= 8; $j++) {
		echo "<div class=\"";
		echo ($flag) ? "quadroBranco" : "quadroPreto";
		if ($j == 0) {
			echo ", primeiro";
		}
		echo "\"></div>";

		$flag = !$flag;
	}
	echo "<br/>";
}
?>