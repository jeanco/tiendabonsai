<?php

namespace App\Services;

class NextNumberService
{
    public function execute($value){

		$ceros = "";

		$tam = strlen($value);
		$x = (float)$value;
		$x++;
		$x = strval($x);
		$new_tam = strlen($x);
		$cant_ceros = $tam-$new_tam;

		for ($i=0; $i < $cant_ceros ; $i++) {
			$ceros .= "0";
		}

		return $ceros.$x;
    }

}
