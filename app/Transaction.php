<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
	protected $table = 'transaction';
	
	protected $fillable = ['order_number', 'id_users', 'mobile_number', 'shopping_type', 'id_balance', 'product', 'shipping_address', 'price', 'shipping_code', 'status'];

	public function balance() {
		return $this->belongsTo('App\Balance', 'id_balance');
	}
	
	public function user() {
		return $this->belongsTo('App\User', 'id_users');
	}
	
}
