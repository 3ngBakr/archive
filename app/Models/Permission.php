<?php

namespace App\Models;

use Spatie\Permission\Models\Permission as OriginalPermission;

class Permission extends OriginalPermission
{
	public    $table    = 'permissions';
	protected $fillable = ['name', 'group', 'guard_name'];
	protected $dates    = ['created_at', 'updated_at', 'deleted_at',];
}
