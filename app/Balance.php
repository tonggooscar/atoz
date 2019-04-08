<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Balance extends Model
{
    //
	protected $table = 'balance';
	
	protected $fillable = ['balance_value'];
	
	public function balance() {
		return $this->hasMany('App\Transaction', 'id_balance');
	}
}
