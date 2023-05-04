<?php
	//***********************************************************************************************
	// AUTOR: Ricardo Erick Rebêlo
	// Objetivo: classe de conexão com o banco de dados da academia
	// Alterações:
	// 01    03/05/2023 - consultaExercicios

	//***********************************************************************************************
	// Classe academia

	class academia
	{
		public $conexao;

		public $hostname = "";
		public $database = "";
		public $username = "";
		public $password = "";

		function __construct()
		{
			$this->conexao = new mysqli( $this->hostname, $this->username, $this->password, $this->database);

			// Checa se a conexão teve sucesso
			if ( $this->conexao->connect_errno)
			{
			    die( "Falha ao conectar: (" . $this->conexao->connect_errno . ") " . $this->conexao->connect_error);
			}
		}

		function __destruct()
		{
			$this->conexao->close();

			// Checa se a desconexão teve sucesso
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
