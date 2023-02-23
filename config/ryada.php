<?php

return [
	'date_format'         => 'Y-m-d',
	'time_format'         => 'H:i:s',
	'datetime_format'     => 'Y-m-d H:i:s',
	'contact_email'       => 'shirazbajrai@gmail.com',
	'primary_language'    => 'ar',
	'supported_languages' => [
		[
			'title'      => 'English',
			'short_code' => 'en',
		],
		[
			'title'      => 'Arabic',
			'short_code' => 'ar',
		],
	],
	'pagination'          => [
		'options' => [
			10,
			25,
			50,
			100,
		],
	],
	'models'              => [
		'user'          => [
			'model'   => 'user',
			'tab'     => 'users_management',
			'icon'    => 'bx bx-user',
			'fields'  => ['Name', 'Email', 'Roles'],
			'columns' => [
				['data' => 'name', 'name' => 'name'],
				['data' => 'email', 'name' => 'email'],
				['data' => 'roles', 'name' => 'roles.name'],
			],
		],
		'role'          => [
			'model'   => 'role',
			'tab'     => 'users_management',
			'icon'    => 'bx bx-briefcase',
			'fields'  => ['Name'],
			'columns' => [
				['data' => 'name', 'name' => 'name'],
			],
		],
		'permission'    => [
			'model'   => 'permission',
			'tab'     => 'users_management',
			'icon'    => 'bx bx-check-shield',
			'fields'  => ['Name'],
			'columns' => [
				['data' => 'name', 'name' => 'name'],
			],
		],

		'main'         => [
			'model'   => 'main',
			'tab'     => 'main',
			'icon'    => 'lni lni-network',
			'fields'  => ['Name', 'Description','Image'],
			'columns' => [
				['data' => 'name', 'name' => 'name'],
				['data' => 'description', 'name' => 'description'],
				['data' => 'image', 'name' => 'image'],
		
			],
		],
		
		'document'      => [
			'model'   => 'document',
			'tab'     => 'download_center',
			'icon'    => 'bx bx-check-shield',
			'fields'  => ['Name', 'Description', 'Document Types' , 'User'],
			'columns' => [
				
				['data' => 'name', 'name' => 'name'],
				['data' => 'description', 'name' => 'description'],
				['data' => 'documentTypes', 'name' => 'documentTypes.name'],
				['data' => 'users', 'name' => 'users.name'],
			],
		],
		'document_type' => [
			'model'   => 'document_type',
			'tab'     => 'download_center',
			'icon'    => 'bx bx-check-shield',
			'fields'  => ['Name'],
			'columns' => [
				['data' => 'name', 'name' => 'name'],
			],
		],
		'program'       => [
			'model'   => 'program',
			'tab'     => 'program',
			'icon'    => 'lni lni-revenue',
			'fields'  => ['Name', 'Cover', 'Parent Program'],
			'columns' => [
				['data' => 'name', 'name' => 'name'],
				['data' => 'cover', 'name' => 'cover'],
				['data' => 'parentProgram', 'name' => 'program_id'],
			],
		],

		'bage'       => [
			'model'   => 'bage',
			'tab'     => 'default',
		
			'fields'  => ['Name', 'Description', 'Vision','Message','Objective'],
			'columns' => [
				['data' => 'name', 'name' => 'name'],
				['data' => 'description', 'name' => 'description'],
				['data' => 'vision', 'name' => 'vision'],
				['data' => 'message', 'name' => 'message'],
				['data' => 'objective', 'name' => 'objective'],
			],
		],

		
		'social'       => [
			'model'   => 'social',
			'tab'     => 'default',
		
			'fields'  => ['Facebook', 'Twitter', 'Whatsapp','Instagram','Telegram'],
			'columns' => [
				['data' => 'facebook', 'name' => 'facebook'],
				['data' => 'twitter', 'name' => 'twitter'],
				['data' => 'whatsapp', 'name' => 'whatsapp'],
				['data' => 'instagram', 'name' => 'instagram'],
				['data' => 'telegram', 'name' => 'telegram'],
			],
		],

		'contact'       => [
			'model'   => 'contact',
			'tab'     => 'default',
			'icon'    => 'bx bx-coffee',
			'fields'  => ['Name', 'Email', 'Phone', 'Subject'],
			'columns' => [
				['data' => 'name', 'name' => 'name'],
				['data' => 'email', 'name' => 'email'],
				['data' => 'phone', 'name' => 'phone'],
				['data' => 'subject', 'name' => 'subject'],
			],
		],
		'service'       => [
			'model'   => 'service',
			'tab'     => 'service',
			'icon'    => 'lni lni-revenue',
			'fields'  => ['Name', 'Description', 'Order All Child','Logo', 'Parent Service'],
			'columns' => [
				['data' => 'name', 'name' => 'name'],
				['data' => 'description', 'name' => 'description'],
				['data' => 'order_all_child', 'name' => 'order_all_child'],
				['data' => 'logo', 'name' => 'logo'],
				['data' => 'parentService', 'name' => 'service_id'],
				
			],
		],
		'order'         => [
			'model'   => 'order',
			'tab'     => 'service',
			'icon'    => 'lni lni-network',
			'fields'  => ['Name', 'Position', 'Email', 'Company Name', 'Services'],
			'columns' => [
				['data' => 'name', 'name' => 'name'],
				['data' => 'position', 'name' => 'position'],
				['data' => 'email', 'name' => 'email'],
				['data' => 'company', 'name' => 'company'],
				['data' => 'services', 'name' => 'services.name'],
			],
		],
		'partner'       => [
			'model'   => 'partner',
			'tab'     => 'default',
			'fields'  => ['Name'],
			'columns' => [
				['data' => 'name', 'name' => 'name'],
			],
		],
		'blog'          => [
			'model'   => 'blog',
			'tab'     => 'blog',
			'icon'    => 'lni lni-revenue',
			'fields'  => ['title', 'Type','Image'],
			'columns' => [
				['data' => 'title', 'name' => 'title'],
				['data' => 'type', 'name' => 'type'],
				['data' => 'image', 'name' => 'image'],
			],
		],
	],
	'model_permissions'   => [
		'index',
		'show',
		'create',
		'edit',
		'delete',
		'force-delete',
		'restore',
		'trashed'
	],
	'collections'         => [
		'downloads'    => 'downloads',
		'posts'        => 'posts',
		'models_logo'  => 'logo',
		'models_cover' => 'cover',
		'models_image' => 'image',
		'contacts'     => 'contacts',
		'objectives'     => 'objectives',
		'orders'       => 'orders',
	
	],
	'file_mimes'          => [
		'downloads'    => ['pdf', 'xlsx', 'xltx', 'docx', 'dotx', 'pptx', 'sldx', 'ppsx', 'potx'],
		'orders'       => ['pdf', 'xlsx', 'xltx', 'docx', 'dotx', 'pptx', 'sldx', 'ppsx', 'potx'],
		'models_cover' => ['png', 'jpg', 'jpeg'],
		'models_logo'  => ['png', 'jpg'],
		'models_image'  => ['png', 'jpg'],
		
	],
	'our_programs_types'  => [
		'TE' => 'تقني',
		'DE' => 'تنموي',
		'IN' => 'إستشاري',
	],
	'our_blogs_types'     => [
		'NE' => 'أخبار',
		'AC' => 'مقال',
	],
];
