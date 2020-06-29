<?php

use App\ModePayment;
use Illuminate\Database\Seeder;

class ModePaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$modePayments = [
			[
				'name' => 'Cash'
			],
			[
				'name' => 'Cheque'
			],
			[
				'name' => 'File Transter'
			],
			[
				'name' => 'Others'
			]
		];

    	foreach ($modePayments as $payment) {
    		ModePayment::create($payment);
    	}
    }
}
