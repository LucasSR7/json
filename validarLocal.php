<?php

class ValidarLocal{
	public static function validarLocal(array &$registro){
        for ($i=1; $i <= 5; $i++) { 
            $localTipoNivel = 'descricao_tipo_local_nivel_'.$i;
            $localLocalNivel = 'descricao_local_nivel_'.$i;
            if (empty($registro['localizacao'][$localTipoNivel])) {
                unset($registro['localizacao'][$localTipoNivel]);
    	        unset($registro['localizacao'][$localLocalNivel]);
           }
        }
    }
}