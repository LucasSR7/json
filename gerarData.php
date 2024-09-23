<?php

class GerarData{

    private $dateString;

    public function __construct(){
        $this->dateString = "20/09/2024";
    }

	public function gerarData($quantidadeRepeticoes, $contador){
        $baseDate = DateTime::createFromFormat('d/m/Y', $this->dateString);
        $totalRegistros = $quantidadeRepeticoes;
        $count50 = ceil($totalRegistros / 2);

        $count50Plus1 = $totalRegistros - $count50;
            if ($contador <= $count50) {
                 $newDate = clone $baseDate;
            } else {
                $newDate = clone $baseDate;
                $newDate->modify('+1 day');
            }

            return $newDate->format('d/m/Y');

        }
}