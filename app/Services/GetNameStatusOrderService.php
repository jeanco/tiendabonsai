<?php

namespace App\Services;

class GetNameStatusOrderService {
	public function execute($status) {

		switch ($status) {
		case 1:
			$text = "Pendiente";
			break;

		case 2:
			$text = "Confirmado";
			break;

		case 3:
			$text = "Cancelado";
			break;

		}

		return $text;
	}

}
