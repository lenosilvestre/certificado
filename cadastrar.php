<?php
session_start();
include("conexao.php");


/*$usuario = mysqli_real_escape_string($conexao, trim($_POST['usuario']));
$senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));

$sql = "select count(*) as total from usuario where usuario = '$usuario'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
	$_SESSION['usuario_existe'] = true;
	header('Location: cadastro.php');
	exit;
}*/


if(isset($_POST['nome'])  ){	

	
		$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
		$sql = "INSERT INTO pessoa (nome) VALUES ('$nome')";

		if($conexao->query($sql) === TRUE) {
			$sql = "select id from pessoa where nome = '$nome'";
			
			$con  = $conexao->query($sql) or die($conexao->error);
			
			$idpessoa = $con->fetch_array();
			
			
			//dseleciona o evento
			$sel_evento = mysqli_real_escape_string($conexao, trim($_POST['selectevento']));
			
			//busca a id do evento
			$sql = "select id from evento where nome = '$sel_evento'"; 
			$con  = $conexao->query($sql) or die($conexao->error);
			$idevento = $con->fetch_array();
			//fim da busca do id evento
			
			$sel_part =  mysqli_real_escape_string($conexao, trim($_POST['selectparti']));
			
			$idpessoa = intval($idpessoa['id']);
			$idevento = intval($idevento['id']);
			
			$sql = "INSERT INTO certificado (validador, pessoa_id, evento_id, tipo_participacao ) VALUES ('ABC','$idpessoa', '$idevento','$sel_part')";
			
			
			
			$_SESSION['dado1'] = $dado2['id']; /*apagar essa linha*/
			
			
			if($conexao->query($sql) === TRUE){	
				$_SESSION['status_cadastro'] = true;
				$conexao->close();
				header('Location: cadastro.php');
				exit;
			
			}else{
				$_SESSION['verifica'] = TRUE;
				header('Location: cadastro.php');
				exit;
			}	
		
			
		
		}else{
			$_SESSION['verifica'] = TRUE;
			header('Location: cadastro.php');
			exit;
		}
		
}
else if(isset($_POST['evento'])){
	
	
	$evento = mysqli_real_escape_string($conexao, trim($_POST['evento']));
	$data_evento = mysqli_real_escape_string($conexao, trim($_POST['data_evento']));
	$carga_horaria= mysqli_real_escape_string($conexao, trim($_POST['carga_horaria']));	
	$descricao= mysqli_real_escape_string($conexao, trim($_POST['descricao']));	
	$observacao= mysqli_real_escape_string($conexao, trim($_POST['observacao']));

	
	$sql = "select count(*) as total from evento where nome = '$evento' and data_evento = '$data_evento'" ;
	$result = mysqli_query($conexao, $sql);
	$row = mysqli_fetch_assoc($result);
	
	if($row['total'] == 1) {
		
		$_SESSION['evento_existe'] = TRUE;
		$conexao->close();
		header('Location: cadastro_certificado.php');
		exit;
	}
	
	$sql = "INSERT INTO evento (nome, data_evento, carga_horaria, descricao, observacao ) VALUES ('$evento','$data_evento', '$carga_horaria', '$descricao', '$observacao')";
	
		
	if($conexao->query($sql) === TRUE) {
			$_SESSION['status_cadastro'] = FALSE;
			
	$conexao->close();

	header('Location: cadastro_certificado.php');
	exit;
		
	}
}






?>