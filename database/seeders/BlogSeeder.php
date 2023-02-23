<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
	public function run(): void
	{
	/*	$faker = Faker::create();
		$types = collect(array_keys(config("ryada.our_blogs_types")));
		$blogs = [];

		for ($i = 1; $i <= 20; $i++) {
			$blogs[] = [
				'title'     => $faker->unique()->sentence(4),
				'author_id' => 1,
				'content'   => $faker->paragraph(5),
				'type'      => $types->random(1)[0]
			];
		}

		DB::table('blogs')->insert($blogs);*/
	}
}
