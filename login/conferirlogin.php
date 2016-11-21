<?php
	// session_start inicia a sessão
	session_start();

	include '../conexao.php';

	
	$usuario= $_POST['usuario'];
	$senha=  md5($_POST['senha']);
	
	var_dump($_POST);
	echo $senha;
	
	$comandosql = "SELECT * FROM tb_usuario WHERE login='$usuario' and senha='$senha'";
	
	$resultado = mysql_query($comandosql);
	
	
	
	if(mysql_num_rows ($resultado) > 0 )
	{
		$_SESSION['usuario'] = $usuario;
		$_SESSION['senha'] = $senha;
		header('location:../inscricao.php');
	}
	else{
		unset ($_SESSION['usuario']);
		unset ($_SESSION['senha']);
		header('location:index.html');
	
	}
	
?>