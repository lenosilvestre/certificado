<?php 
	//referenciar o DOMPDF com namespace
	use Dompdf\Dompdf;
	// include autoloader
	require_once 'dompdf/autoload.inc.php';
	
	//criando a instancia
	$dompdf = new DOMPDF();
	
	//endereco da pagina
	$html = file_get_contents('template.php');
	
	$dompdf->load_html($html);
	
	// Definindo o papel e a orientação

	$dompdf->setPaper('A4', 'landscape');
	//renderizar o html
	$dompdf->render();
	
	//exibir a pagia
	$dompdf->stream("pagina.pdf",
		array( "Attachment"=> false //para realizar o download somente altera para true
		)
	);
?>