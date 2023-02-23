<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
	public function run(): void
	{
		$partners = array(
			[
				'name'       => 'أبو علي القفيل للتجارة',
				'image_name' => 'Abu Ali Al-Qufail Trading',
				'created_at' => now(),
			],
			[
				'name'       => 'الشيباني بلاس',
				'image_name' => 'Al-SHAIBANI Plus',
				'created_at' => now(),
			],
			[
				'name'       => 'نبرز الجمال',
				'image_name' => 'Berwaz com',
				'created_at' => now(),
			],
			[
				'name'       => 'مجموعة كافي',
				'image_name' => 'Cafi',
				'created_at' => now(),
			],
			[
				'name'       => 'إنتقاء',
				'image_name' => 'INTIQAA',
				'created_at' => now(),
			],
			[
				'name'       => 'نون للإعلام',
				'image_name' => 'Noon Media',
				'created_at' => now(),
			],
			[
				'name'       => 'التطبيقات الذكية',
				'image_name' => 'Smart Yemen Apps',
				'created_at' => now(),
			],
		);

		foreach ($partners as $partner) {
			$imageName = $partner['image_name'];
			unset($partner['image_name']);

			$model = Partner::create($partner);

			$model->addLogoFromPath(public_path("assets/images/partners/{$imageName}.png"));
		}
	}
}
