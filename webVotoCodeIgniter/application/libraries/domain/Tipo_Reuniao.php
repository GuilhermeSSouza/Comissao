<?php

class Tipo_Reuniao{

	const Ordianria = 1;
	const Extraordinaria = 2;

	/**
	 * Tipo_Reuniao constructor.
	 */
	public function __construct(){
	}

	public static function getNome($valor){
		switch ($valor){
			case 1:
				return "Ordinaria";
				break;
			case 2:
				return "Extraordinaria";
				break;
		}
	}
}
