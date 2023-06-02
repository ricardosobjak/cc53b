<?php
	//Função que soma dois números
	function soma($x, $y) {
		return $x + $y;
	}

	//Função que subtrai dois números
	function subtrai($x, $y) {
		return $x - $y;
	}

	//Função que multiplica dois números
	function multiplica($x, $y) {
		return $x * $y;
	}

	//Função que divide dois números
	function divide($x, $y) {
		return $x / $y;
	}
	
	
	function operacao($x, $y, $op) {
		switch($op) {
			case '+' : {
				return soma($x, $y);
				break;
			}
			case '-' : {
				return subtrai($x, $y);
				break;
			}
			case '*' : {
				return multiplica($x, $y);
				break;
			}
			case '/' : {
				return divide($x, $y);
				break;
			}
			default : {
				return false;
			}
		}
	}
	
	
	echo "<br/>30 + 10 = " . operacao(30, 10, '+');
	echo "<br/>30 - 10 = " . operacao(30, 10, '-');
	echo "<br/>30 * 10 = " . operacao(30, 10, '*');
	echo "<br/>30 / 10 = " . operacao(30, 10, '/');

	echo "<br/><br/>";

	echo "<br/>50 + 10 = " . soma(50, 10);
	echo "<br/>50 - 10 = " . subtrai(50, 10);
	echo "<br/>50 * 10 = " . multiplica(50, 10);
	echo "<br/>50 / 10 = " . divide(50, 10);
?>