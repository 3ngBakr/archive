<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	use HasFactory;

	public    $table    = 'orders';
	protected $fillable = ['name', 'email', 'personal_phone', 'company_phone', 'company', 'position', 'message'];
	protected $dates    = ['created_at', 'updated_at', 'deleted_at'];

	protected function serializeDate(DateTimeInterface $date): string
	{
		return $date->format('Y-m-d H:i:s');
	}

	public function getServicesName(): string
	{
		return implode(' - ', $this->services->pluck('name')->toArray());
	}

	public function services(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
	{
		return $this->belongsToMany(Service::class, 'service_order');
	}
}
