<?php
require_once './class/Item.php';
require_once './class/Montador.php';
require_once './class/Contador.php';

$montador = new montador();

$montagens = "montagens.txt";

$by = "Gidenilson Alves Santiago";
$link = "";


$entrada = isset($_REQUEST['entrada']) ? $_REQUEST['entrada'] : "";
$linha = explode("\n", $entrada);
$linha = array_map("formatanumero", $linha);
$linha = array_map("separa", $linha);
foreach ($linha as $item) {
    if (isset($item[0]) && isset($item[1]))
        $montador->addItem(new item($item[0], $item[1]));
}


function separa($param) {
    return str_word_count($param, 1, "0123456789.,");
}

function formatanumero($param) {
    return str_replace(",", ".", $param);
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Montador de Expressão - Moodle</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  
    <div class="container">
		<div class="page-header">
			<h1>Montador de Expressão <small>para cálculo de frequência automática no Moodle</small></h1>
		</div>
		<div class="row">

			<div class="col-md-6">
			<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Copie do Word e cole, neste campo abaixo a tabela com as informações necessária.</h3>
						<h4><small><i>Obs.: A tabela deve ser composta de duas colunas e quantas linhas forem necessárias para as atividades. Ela não deve ter títulos e sim apenas o índice (letra) e a carga horária (em horas) de cada atividade a ser pontuada no sistema de notas do Moodle.</i></small></h4>
						
					</div>
					<div class="panel-body">
				<form method='post'>
					<div class="form-group">
						
						<textarea class="form-control" id="entrada"  rows="5" name="entrada"><?php echo $entrada ?></textarea>
						
					</div>
					<div class="form-group"> 
						<button type="submit" class="btn btn-primary">Enviar</button>
					</div>
				</form>
				</div>
				</div>
			</div>
			<div class="col-md-6">
				<?php if($entrada != ""){
					Contador::inc($montagens);
				?>
				
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Expressão:</h3>
					</div>
					<div class="panel-body">
						<?php echo $montador->monta()?>
					</div>
				</div>
				<?php }else{ ?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Imagem do dia:</h3>
					</div>
					<div class="panel-body">
					  <img src="http://lorempixel.com/600/400/" class="img-responsive img-rounded" alt="imagem do dia">
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<small><i>by Gidenilson Alves Santiago</i></small>
			</div>
			<div class="col-md-4">
				<a href="https://github.com/gidenilson/exp-freq-moodle"><i class="fa fa-github"></i> <small>view github</small></a>
			</div>
			<div class="col-md-4">
				<small><i>Até agora já montamos <?php echo Contador::get($montagens) ?> expressões.</i></small>
			</div>


		</div>
		
	</div>


  


  </body>
</html>