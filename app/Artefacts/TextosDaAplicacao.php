<?php

namespace App\Artefacts;

class TextosDaAplicacao {

	
	public $startApplication = "start application";
	public $readEnvFile = "read .env file";
	public $startConnectionGoogleService = "Iniciando conexao com os servicos do Google";
	public $startNewToken = "token foi expirado, iniciando novo token";
	public $readFilesThatWillBeUploaded = "Iniciando leitura dos arquivo que subirão";
	public $buildProcessFileOrientation = "Criando e/ou Processando o arquivo de orientação de remoção dos dados";
	public $criadoArquivo = "Arquivo não existe, criando e escrevedo dados no arquivo";
	public $arquivoExiste = "Esse arquivo já existe, sem necessidade de criar";

	public static $instance;
	
	private function __construct() {}

	static public function start() {

		if (self::$instance == null) {
			self::$instance = new TextosDaAplicacao();
			return self::$instance;
		}

		return self::$instance;

	}

	public function textoAcessoArquivoUrl($addressOfFile) {

		return "Um arquivo foi salvo em {$addressOfFile} - acesse o arquivo, abra a url no navegador Após isso, no mesmo diretório, crie um arquivo chamado token.gs e salve o token ali Após fazer isso, pressione Enter";
	}
	
}