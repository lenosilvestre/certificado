
<?php 
session_start();

$nome 			 = $_POST['evento'];
$erro 			 = 0;

//Verifica se o campo nome não está em branco
if (empty($nome) OR strstr($nome, ' ')==TRUE) {
	echo "Favor digitar o seu nome corretamente.<br>";
	$erro = 1;
	include("cadastrar.php");
}

//Verifica se não houve erro - neste caso chama a include para inserir os dados
if ($erro == 0) {
	include("cadastrar.php");
}

 ?>
</body>
</html>