<?php
	echo "GET:" . var_dump($_GET) . "<br>";
	echo "POST:" . var_dump($_POST) . "<br>";
	echo "posicao nome" . $_POST['nome'];
	
	
	/*configura��o de endere�amento do banco de dados*/
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	
	/*configura��o de acesso do banco de dados*/
	$nome_banco = "bd_centro_interesse";
	
	$conex�o = mysql_connect($servidor, $usuario, $senha);
	
	$banco = mysql_select_db($nome_banco, $conex�o);
	
?>