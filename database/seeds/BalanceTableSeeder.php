<?php

use Illuminate\Database\Seeder;
use App\Balance;

class BalanceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		///DB::table('balance')->truncate();
 
		Balance::create(array(
			'balance_value'=>10000
		));
 
		Balance::create(array(
			'balance_value'=>50000
		));
 
		Balance::create(array(
			'balance_value'=>100000
		));
    }
}
