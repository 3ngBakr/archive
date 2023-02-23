<?php

namespace App\Models;

use Spatie\Permission\Models\Role as OriginalRole;

class Role extends OriginalRole
{
	public    $table    = 'roles';
	protected $fillable = ['name', 'guard_name'];
	protected $dates    = ['created_at', 'updated_at', 'deleted_at',];
}
