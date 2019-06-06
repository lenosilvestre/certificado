
<?php
session_start();
include('verifica_login.php');
?>

<!DOCTYPE html>
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
                    <h3 class="title has-text-grey">Sistema de Cadastro</h3>
					<div class="box">
						<a href="cadastro.php"> <button type="submit" class="button is-block is-link is-large is-fullwidth">Cadastrar Participante</button></a>
					</div>
					<div class="box">
					<a href="cadastro_certificado.php"> <button type="submit" class="button is-block is-link is-large is-fullwidth">Cadastrar Evento</button></a>
					</div>
					<div class="box">
					<a href="exibircertificado.php"> <button type="submit" class="button is-block is-link is-large is-fullwidth">Exibir certificado</button></a>
					</div>
			</div>
    </section>
</body>

</html>