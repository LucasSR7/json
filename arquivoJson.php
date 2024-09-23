<?php

require 'gerarData.php';

class ArquivoJson extends GerarData{

	public static function getObjetoJson($dados, $i, $estado, $quantidadeRepeticoes){
		$numeroIdent = 2006000;
      $incremento = 1;
		$gData = new GerarData;
		$registro = [
            "id" => (int)$dados[$i]['id_bem_movel'],
            "identificacao_etiqueta_atual" => "" . $dados[$i]['num_ident_bem_mov']."",
             "identificacao_etiqueta_nova" => $numeroIdent += $i,
             "descricao" => str_replace('"', "'", $dados[$i]['desc_bem_mov']),
             "localizacao" => [
                "id" => (int)$dados[$i]['id_loca_bem'],
                 "descricao_tipo_local_nivel_1" => $dados[$i]['local_n1'],
                 "descricao_local_nivel_1" => $dados[$i]['desc_tipo_local_n1'],
                 "descricao_tipo_local_nivel_2" => $dados[$i]['local_n2'],
                 "descricao_local_nivel_2" => $dados[$i]['desc_tipo_local_n2'],
                 "descricao_tipo_local_nivel_3" => $dados[$i]['local_n3'],
                 "descricao_local_nivel_3" => $dados[$i]['desc_tipo_local_n3'],
                 "descricao_tipo_local_nivel_4" => $dados[$i]['local_n4'],
                 "descricao_local_nivel_4" => $dados[$i]['desc_tipo_local_n4'],
                 "descricao_tipo_local_nivel_5" => $dados[$i]['local_n5'],
                 "descricao_local_nivel_5" => $dados[$i]['desc_tipo_local_n5'],
               ],
                  "codigo_orgao_responsavel_bem" => (int)$dados[$i]['corg7'],
                    "imagens_etiquetas" => [
                     "https://imgetiquetas.github.io/etiqueta123.jpg"
                 ],
                    "imagens_bem" => [
                        "https://imgbem.github.io/movel123.jpg",
                        "https://imgbem.github.io/movel1234.jpg"
                    ],
               "estado_bem" => "".$estado."",
               "data_levantamento" => $gData->gerarData($quantidadeRepeticoes, $i)
        ];

        return $registro;
	}
}