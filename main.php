<?php
require_once 'validarLocal.php';
require_once 'arquivoJson.php';

    class Index {

        private $caminho_arquivo;
        private $dados;
        private $valLocal;
        private $arqJson;
    
        public function __construct($caminho_arquivo) {
            $this->caminho_arquivo = $caminho_arquivo;
            $this->valLocal = new ValidarLocal;
            $this->arqJson = new ArquivoJson;
        }
    
        public function processarArquivo() {
            $this->carregarDados();
            $this->gerarEstrutura();
        }
    
        private function carregarDados() {
            if (!file_exists($this->caminho_arquivo)) {
                throw new \Exception("O arquivo não existe: ". $this->caminho_arquivo);
            }
            $json_content = file_get_contents($this->caminho_arquivo);
            $this->dados = json_decode($json_content, true);
        }
    
        private function gerarEstrutura() {
            $novoJsonFile = 'arquivosGerados/'.$_POST['opcoes'].'.json';
            // Abre o arquivo para escrita (cria se não existir)
            $file = fopen($novoJsonFile, 'w');
    
            // Verifica se o arquivo foi aberto com sucesso
            if (!$file) {
                die('Erro ao abrir o arquivo.');
            }
    
            // Escreve o colchete de abertura do JSON
            fwrite($file, "[" . PHP_EOL);
    
            for ($i=0; $i < count($this->dados); $i++) {
                    $quantidadeRepeticoes = count($this->dados);
                    $estado = $this->dados[$i]['id_bem_movel'] % 2 == 0 ? 0 : 1;
                    $registro = ArquivoJson::getObjetoJson($this->dados, $i,
                        $estado, $quantidadeRepeticoes
                    );
                    ValidarLocal::validarLocal($registro);
                    $objetoJson = json_encode($registro, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
                    $objetoJson = stripslashes($objetoJson);
                    fwrite($file, $objetoJson);
    
                    // Adiciona uma vírgula se não for o último item
                    if ($i < $quantidadeRepeticoes - 1) {
                        fwrite($file, "," . PHP_EOL);
                    } else {
                        fwrite($file, PHP_EOL);
                    }  
            }
            // Escreve o colchete de fechamento do JSON
            fwrite($file, "]");
    
            // Fecha o arquivo
            fclose($file);
        }
    }
    try {
        $caminho_arquivo = 'arquivos/'.$_POST['opcoes'].'/'.$_POST['opcoes'].'.json';
        $index = new Index($caminho_arquivo);
        $index->processarArquivo();

    } catch (Exception $e) {
        echo $e->getMessage();
    }
    
?>