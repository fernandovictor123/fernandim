<?php

	
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	
	$nome_banco = "bd_login";
	
	$conexao = mysql_connect($servidor, $usuario, $senha);
	
	if (!$conexao) {
		echo "N�o foi poss�vel connectar ao servidor";
		exit;
	}else{
		"<h1>Conectou</h1>";
	}
	
	$banco = mysql_select_db($nome_banco, $conexao) or die ("N�o foi poss�vel conectar ao banco de dados");
	
	
	$usuario= $_POST['usuario'];
	$senha=  $_POST['senha'];
	
	$comandosql = "SELECT * FROM usuario WHERE nome='$usuario' and senha='$senha';";
	
	$comandosql;
	$resultado = mysql_query($comandosql);
	

	
	if (mysql_errno()) {
		$error = "MySQL error ".mysql_errno().": ".mysql_error()."\n<br>Quando executou:<br>\n$comandosql\n<br>";
		echo $error;
	}
	$itembancodados = mysql_fetch_array($resultado);

	$usuario = $itembancodados['ID_USUARIO'];
	
	
	
	if ($usuario > 0){
		echo "<h1>Deu certo</h1>";
		echo "<a href='inscricao.php'>Clique aqui para voltar</a>";
		
	}else{
		echo "<h1>N�o Deu certo</h1>";
		echo "<a href='inscricao.php'>Clique aqui para voltar</a>";
	}
?>