<?php include 'conexao.php'; ?>
<html>
<head>

	<?php  
		/* esse bloco de código em php verifica se existe a sessão, pois o usuário pode simplesmente não fazer o login e digitar na barra de endereço do seu navegador o caminho para a página principal do site (sistema), burlando assim a obrigação de fazer um login, com isso se ele não estiver feito o login não será criado a session, então ao verificar que a session não existe a página redireciona o mesmo para a index.php.*/
		session_start();
		if((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['senha']) == true))
		{
			unset($_SESSION['usuario']);
			unset($_SESSION['senha']);
			header('location:login/index.html');
		}
		
		$logado = $_SESSION['usuario'];
	?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Inscrição do Centro Interesse</title>
<link href="bootstrap-3.3.6/css/bootstrap.min.css" rel="stylesheet">
<script src="bootstrap-3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css" />
<script>
	function SomenteNumero(e) {
		var tecla = (window.event) ? event.keyCode : e.which;
		if ((tecla > 47 && tecla < 58))
			return true;
		else {
			if (tecla == 8 || tecla == 0)
				return true;
			else
				return false;
		}
	}
	
	
	function SomenteLetra(e) {
		var tecla = (window.event) ? event.keyCode : e.which;
		if ((tecla > 64 && tecla < 91) || (tecla > 96 && tecla < 123))
			return true;
		else {
			if (tecla == 8 || tecla == 0)
				return true;
			else
				return false;
		}
	}
	function confirmou(form) {
		  if (form.TERMODEDECLARACAO.checked == false) {
			  alert("Você precisa concondar com os termos");
			  document.getElementById("TERMODEDECLARACAO").focus();
				return false;
		  }
		  return true;
	}
</script>
</head>
<body>
	<div id="container-um" class="thumbnail">
		<div id="container-dois" class="thumbnail">
			<h1>Inscrição do Centro Interesse</h1>
		</div>
		<form id="formulario" action="salvarinscricao.php"
			onsubmit="return confirmou(this);" role="form" method="POST">
			<div class="form-group">
				<label for="txt_nome"><span
					class="glyphicon glyphicon-text-background" aria-hidden="true"></span>
					NOME:</label> <input type="text" class="form-control" id="txt_nome"
					name="nome" onkeypress='return SomenteLetra(event)' required/>
			</div>
			<div class="form-group">
				<label for="txt_codigo"><span class="glyphicon glyphicon-barcode"
					aria-hidden="true"></span> CÓDIGO DO ALUNO:</label> <input
					type="text" class="form-control" id="txt_codigo" name="meucodigo"
					onkeypress='return SomenteNumero(event)' required/>
			</div>
			<div class="form-group">
				<label for="txt_turma"><span class="glyphicon glyphicon-education"
					aria-hidden="true"></span> TURMA:</label> <input type="text"
					class="form-control" id="txt_turma" name="turma" required/>
			</div>
			<div class="form-group">
				<label for="centrodeinsteresse-um"><span
					class="glyphicon glyphicon-star" aria-hidden="true"></span> CENTRO
					DE INTERESSE 1:</label> <SELECT class="form-control"
					ID="centrodeinsteresse-um" name="opcao1">
					<OPTION VALUE="0">Insira...</option>
				 	<?php
						$query = "SELECT * FROM tb_centro_interesse WHERE horario_inicio='12:30:00'";
						$result = mysql_query ( $query );
						while ( $resultado = mysql_fetch_row ( $result ) ) {
							echo "<OPTION VALUE='" . $resultado [0] . "'>" . $resultado [1] . "</option>";
						}
						?>
					


				</SELECT>
			</div>
			<div class="form-group">
				<label for="centrodeinsteresse-dois"><span
					class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
					CENTRO DE INTERESSE 2:</label> <SELECT class="form-control"
					ID="centrodeinsteresse-dois" name="opcao2">
					<OPTION VALUE="0">Insira...</option>
					<?php
					$query = "SELECT * FROM tb_centro_interesse WHERE horario_inicio='12:30:00'";
					$result = mysql_query ( $query );
					while ( $resultado = mysql_fetch_row ( $result ) ) {
						echo "<OPTION VALUE='" . $resultado [0] . "'>" . $resultado [1] . "</option>";
					}
					?>
				</SELECT><br>
			</div>
			<h2>
				<INPUT TYPE="checkbox" NAME="TERMODEDECLARACAO"
					ID="TERMODEDECLARACAO" VALUE="IE3" />DECLARO ESTAR CIENTE, QUE NÃO
				PODEREI TROCAR DE CENTRO DE INTERESSE DURANTE O SEMESTRE.<br>
			</h2>
			<h2>
				<button type="reset" class="btn btn-danger">
					<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>CANCELAR</button>
				<button type="submit" class="btn btn-success">
					<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>CONFIRMAR</button>
			</h2>

		</form>
	</div>
</body>
</html>