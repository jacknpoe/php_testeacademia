<?php
	//***********************************************************************************************
	// AUTOR: Ricardo Erick Reb�lo
	// Objetivo: classe de conex�o com o banco de dados da academia
	// Altera��es:
	// 0.1   03/05/2023 - consultaExercicios
	// 1.0   03/05/2023 - primeira publica��o
	// 1.1   03/05/2023 - primeira publica��o com o namespace corrigido

	//***********************************************************************************************
	// Classe academia

	namespace jacknpoe;

	class academia
	{
		public $conexao;

		function __construct()
		{
			require_once( 'connect.php');
			$this->conexao = new \mysqli( $hostname, $username, $password, $database);

			// Checa se a conex�o teve sucesso
			if ( $this->conexao->connect_errno)
			{
			    die( "Falha ao conectar: (" . $this->conexao->connect_errno . ") " . $this->conexao->connect_error);
			}
		}

		function __destruct()
		{
			$this->conexao->close();

			// Checa se a desconex�o teve sucesso
			if ( $this->conexao->errno)
			{
			    die( "Falha ao desconectar: (" . $this->conexao->errno . ") " . $this->conexao->error);
			}
		}

		function consultaExercicios()
		{
			$resultado = $this->conexao->query( "SELECT exercicio.NM_EXERCICIO, grupo.NM_GRUPO FROM exercicio INNER JOIN grupo ON exercicio.CD_GRUPO = grupo.CD_GRUPO ORDER BY exercicio.NM_EXERCICIO");

			// Checa se a query teve sucesso
			if ( $this->conexao->errno)
			{
			    die( "Falha ao consultar: (" . $this->conexao->errno . ") " . $this->conexao->error);
			}

			return $resultado;
		}
	}
?>