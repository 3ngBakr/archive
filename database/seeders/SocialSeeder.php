<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialSeeder extends Seeder
{
	public function run(): void
	{
		$socials = array(
				[
				'facebook'            => 'https://www.facebook.com/ryadayemen/',
				'twitter'     => 'https://twitter.com/ryadayemen',
				'whatsapp'     => 'https://wa.me/message/4DVR7XDRD7QBL1',
				'instagram'     => 'https://www.instagram.com/ryadayemen/',
				'telegram'     => 'https://T.me/ryadayemen',
				'created_at' => now(),
			],
			
		);

		DB::table('socials')->insert($socials);
	}
}
