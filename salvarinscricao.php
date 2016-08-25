<?php
	echo var_dump($_GET) . "GET <br>";
	echo var_dump($_POST) . "POST <br>";
	$nome = $_POST['nome'];
	$codigo=  $_POST['meucodigo'];
	$turma = $_POST['turma'];
	$opcao1 = $_POST['opcao1'];
	$opcao2 = $_POST['opcao2'];
	
	
	
	//Buscar a Quantidade de vagas do centro 1
		//select quantidade_vagas from tb_centro_interesse where id_centro_interesse = 1
	
	
	//Buscar a Quantidade de vagas do centro 2
	
	
	//Buscar a Quantidade de inscritos do centro 1
		//select count(*) from 	 where centro_um = 1
	
	
	//Buscar a Quantidade de inscritos do centro 2
	
	/*configurco de enderecmento do bnco de ddos*/
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	
	/*configurco de cesso o bnco de ddos*/
	$nome_banco = "bd_centro_interesse";
	
	$conexao = mysql_connect($servidor, $usuario, $senha);
	
	/*verifica se a conexao realmente foi criada*/
	/*se (nao conexao) entao, ou seja, conexao e falsa*/
	if (!$conexao) {
		echo "Não foi possível connectar ao servidor";
		exit;
	}else{/*senao*/
		echo "<h1>Conectou!</h1>";
	}
	
	/*Selecione o banco de dados ou morra*/
	$banco = mysql_select_db($nome_banco, $conexao) or die ("Não foi possível conectar ao banco de dados");
	
	$comandosql = "INSERT INTO tb_inscricao VALUES ('','$codigo', '$nome', '$turma', '$opcao1','$opcao2', '2016-08-24', '07:10:00')";
	
	echo $comandosql;
	
	$resultado = mysql_query($comandosql);
	/*Encerra a conexao*/
	
	if (mysql_errno()) { 
	  $error = "MySQL error ".mysql_errno().": ".mysql_error()."\n<br>Quando executou:<br>\n$comandosql\n<br>"; 
	  echo $error; 
	} 
	
	mysql_close();
?>