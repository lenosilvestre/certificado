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
    <title>Sistema de Cadastro Certificado</title>
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
               
                    <h3 class="title has-text-grey">Cadastro do Evento</h3>
                  
				   <?php
					if(isset($_SESSION['status_cadastro'])):
					
						?>
						<div class="notification is-success">
							<p>Cadastro efetuado!</p>
					    </div>
					<?php
					endif;
					unset($_SESSION['status_cadastro']);
					
					if(isset($_SESSION['evento_existe'])):
					?>
					
                    <div class="notification is-info">
                        <p>O Evento já cadastrado. Informe outro.</p>
                    </div>
					<?php
					endif;
					unset($_SESSION['evento_existe']);
					
					if(isset($_SESSION['vazio'])):
					?>
					<div class="notification is-info">
                        <p>Informe todos os campos.</p>
                    </div>
					<?php
						endif;
						unset($_SESSION['vazio']);
					?>
                    <div class="box">
                        <form action="cadastrar.php" method="POST">
                            <div class="field">
                                <div class="control">
                                 <h3> Nome do evento </h3>  <input name="evento" type="text" class="input is-large" placeholder="Evento" autofocus>
									
								</div>
                            </div>
                            <div class="field">
                                <div class="control">
                                   <h3> Data do evento </h3> <input name="data_evento" type="text" class="input is-large" placeholder="Data">
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                  <h3> Carga horaria</h3>   <input name="carga_horaria" class="input is-large" type="text" placeholder="Carga horaria">
                                </div>
                            </div>
								<div class="field">
                                <div class="control">
                                  <h3> Descrição do evento </h3>   <textarea name="descricao" class="input is-large" type="text" placeholder="Descrição" ></textarea>
                                </div>
                            </div>
							<div class="field">
                                <div class="control">
                                  <h3> Observações </h3>   <textarea name="observacao" class="input is-large" type="text" placeholder="Observações" ></textarea>
                                </div>
                            </div>
                            <button type="submit" class="button is-block is-link is-large is-fullwidth">Cadastrar</button>
                        </form>
                    </div>
					<div class="box-2">
					<a href="menu.php"> <button type="submit" class="button is-warning is-link is-large is-fullwidth">Voltar</button></a>
					</div>
                
            </div>
        </div>
    </section>
</body>

</html>