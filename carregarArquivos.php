<?php

class CarregarArquivos{

	private $caminho;

	public function __construct(){
		$this->caminho = __DIR__.'\\arquivos';
	}

	public function getPastas(){
		if (is_dir($this->caminho)) {
		    $itens = scandir($this->caminho);
		    unset($itens[0]);
			unset($itens[1]);
		    return $this->pastas = $itens;
		}

		return "O caminho não é um diretório válido.";
	}

}
