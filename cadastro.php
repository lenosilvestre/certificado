
<?php
session_start();
include('verifica_login.php');
include('conexao.php');
$sql = "SELECT * FROM evento";
$con  = $conexao->query($sql) or die($conexao->error);
?>

<!DOCTYPE html>
<html>
    
<head>
	
<script type="text/javascript">
	function validateForm()
	{
		var x=document.forms["formNome"]["nome"].value; //nome do form e nome do campo são case sensitive (a <> A)
		if (x==null || x=="" || x==" ")
	{
		alert("O campo nome é obrigatorio");
		return false;
	}
	}
</script>




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
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-8 is-offset-2">
                    <h3 class="title has-text-grey">Sistema de Cadastro de participante</h3>
                    <h3 class="title has-text-grey">Cadastro de participantes</h3>
                    <?php
					if(isset($_SESSION['status_cadastro'])):
					
						?>
						<div class="notification is-success">
                      <p><?php echo $_SESSION['dado1'];?>Cadastro efetuado!</p>
					 
                      <p>Faça login informando o seu usuário e senha <a href="cadastro_certificado.php">aqui</a></p>
                    </div>
					<?php
					endif;
					unset($_SESSION['status_cadastro']);
					
					if(isset($_SESSION['verifica'])):
					?>
					<div class="notification is-info">
                      <p>Favor informar corretamente os campos!</p>
					</div>
					<?php
					endif;
					unset($_SESSION['verifica']);
				
					?>
					<div class="box">
                        <form name="formNome" action="cadastrar.php" onsubmit="return validateForm()" method="POST">
                            <div class="field">
                                <div class="control">
                                    <input name="nome" type="text" class="input is-large" placeholder="Nome" autofocus>
                                </div>
                            </div> 
					<div class="control">
						<div class="select is-large is-fullwidth">
							<select name ="selectevento">
								<?php while($dado = $con->fetch_array()) { ?>
									<option><?php  echo  $dado['nome']; ?></option>
							
								<?php } ?>	
							</select >
						</div>
					</div>
					<br>
					<div class="control">
						<div class="select is-large is-fullwidth">
							<select name= "selectparti">
								
									<option>  </option>
									<option> Participante </option>
									<option> Organizador </option>
								
							</select>
						</div>
					</div>
					</div>
					
					<div class="box-2">
                            <button type="submit" class="button is-block is-link is-large is-fullwidth">Cadastrar</button>
                      </form>
					  <br>
					  </div>
					<div class="box-2">
					<a href="menu.php"> <button type="submit" class="button is-warning is-link is-large is-fullwidth">Voltar</button></a>
					</div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>