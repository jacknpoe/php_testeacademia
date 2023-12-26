<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<title>Teste da classe academia: Consultar exerc&iacute;cio</title>
 		<link rel="stylesheet" href="php_testeacademia.css"/>
		<link rel="icon" type="image/png" href="php_testeacademia.png"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<?php
			require_once( 'configuracoes.php');
			header("Content-Type: text/html; charset=UTF-8", true);

			$resultado = '';
			$valor = '';

			if( isset( $_POST[ 'pesquisar']))
			{
				$valor = $_POST["valor"];
			}
			require_once( 'academia.php');
			$classe_academia = new \jacknpoe\academia();
			$tabela = $classe_academia->consultaExercicios( $valor);

			while ( $coluna = $tabela->fetch_assoc())
			{
				$resultado .= '<div id="linha"><div id="coluna1">';
				$resultado .= htmlspecialchars( $coluna[ "NM_EXERCICIO"], ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401, CARACTERES);
				$resultado .= '</div><div id="coluna2">';
				$resultado .= htmlspecialchars( $coluna[ "NM_GRUPO"], ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401, CARACTERES);
				$resultado .= '</div></div>';
			}

			$tabela->free_result();
//			$tabela->close();
		?>
		<h1>Teste da classe academia: Consultar exerc&iacute;cio</h1>

		<form action="php_testeacademia.php" method="POST" style="border: 0px">
			<p>Valor: <input type="text" name="valor" style="width: 200px" value="<?php echo htmlspecialchars( $valor, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401, CARACTERES); ?>" autofocus></p>
			<p><input type="submit" name="pesquisar" value="Pesquisar"></p>
		</form>

		<br>
		<div id="cabecalho">
			<div id="coluna1">Exerc&iacute;cio</div>
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