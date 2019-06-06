<?php
session_start();
include('conexao.php');
$sql = "SELECT * FROM evento";
$con  = $conexao->query($sql) or die($conexao->error);


/*if($conexao->query($sql) === TRUE) {
			$_SESSION['status_cadastro'] = true;
			$conexao->close();

			header('Location: cadastro.php');
			exit;
		}
*/
?>

<html>
    
<head>
	
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Certificado Online</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<body>
<h2>Olá, <?php echo $_SESSION['nome'];?></h2>
<h2><a href="logout.php">Sair</a></h2>
    <section class="hero is-success is-fullheight">
            <div class="container has-text-centered">
                    <h3 class="title has-text-grey">Mostra Certificado</h3>
					
	<div class="control">
		<div class="select is-large is-fullwidth">
		<select>
    <?php while($dado = $con->fetch_array()) { ?>
		<option><?php  echo  $dado['nome']; ?></option>
		
    <?php } ?>	
		</select>
		</div>
	</div>
	<br>
	<div class="box-2">
		<a href="menu.php"> <button type="submit" class="button is-warning is-link is-large">Voltar</button></a>
	</div>
	

</body>
</html>