<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BageSeeder extends Seeder
{
	public function run(): void
	{
		$bages = array(
				[
				'name'            => 'اسم الشركة',
				'description'     => 'نبذة عن الشركة',
				'vision'     => 'الرؤية',
				'message'     => 'الرسالة',
				'objective'     => 'الأهداف',
			],
			
		);

		DB::table('bages')->insert($bages);
	}
}
