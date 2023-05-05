<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<title>Teste da classe academia</title>
 		<link rel="stylesheet" href="php_testeacademia.css"/>
		<link rel="icon" type="image/png" href="php_testeacademia.png"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<?php
			require_once( 'configuracoes.php');
			$cabecalho = "Content-Type: text/html; charset=" . $caracter;
			header( $cabecalho, true);

			require_once( 'academia.php');
			$classe_academia = new \jacknpoe\academia();
			$tabela = $classe_academia->consultaExercicios();

			$resultado = '';

			while ( $coluna = $tabela->fetch_assoc())
			{
				$resultado .= '<div id="linha"><div id="coluna1">';
				$resultado .= htmlspecialchars( $coluna[ "NM_EXERCICIO"], ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401, $caracter);
				$resultado .= '</div><div id="coluna2">';
				$resultado .= htmlspecialchars( $coluna[ "NM_GRUPO"], ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401, $caracter);
				$resultado .= '</div></div>';
			}

			$tabela->free_result();
//			$tabela->close();
		?>
		<h1>Teste da classe academia</h1>

		<br>
		<div id="cabecalho">
			<div id="coluna1">Exercício</div>
			<div id="coluna2">Grupo</div>
		</div>

		<div id="gride">
			<?php echo $resultado; ?>
		</div>

		<br>
		<p><a href="https://github.com/jacknpoe/php_testeacademia">Reposit&oacute;rio no GitHub</a></p><br>
		<form action="index.html" method="POST" style="border: 0px">
			<p><input type="submit" name="voltar" value="Voltar"></p>
		</form>
	</body>
</html>