<?php
	echo "GET:" . var_dump($_GET) . "<br>";
	echo "POST:" . var_dump($_POST) . "<br>";

	
	
	/*configuração de endereçamento do banco de dados*/
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	
	/*configuração de acesso do banco de dados*/
	$nome_banco = "bd_centro_interesse";
	
	$conexao = mysql_connect($servidor, $usuario, $senha);
	
	$banco = mysql_select_db($nome_banco, $conexao);
	
	if (!$conexao) {
		echo "Nao foi possivel conectar ao banco MySQL."; 
		exit;
	}else{ 
		echo "Parabens!! A conexao ao banco de dados ocorreu normalmente!";
	}
	mysql_close();
?>