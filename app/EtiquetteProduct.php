<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EtiquetteProduct extends Model
{
	use SoftDeletes;
    
	protected $dates = ['deleted_at'];

	protected $table = "etiquette_product";

}
