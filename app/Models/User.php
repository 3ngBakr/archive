<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
	use HasApiTokens, HasFactory, HasProfilePhoto, Notifiable, TwoFactorAuthenticatable, HasRoles;

	public $table = 'users';

	protected $fillable = [
		'name',
		'email',
		'password',
	];

	protected $dates = [
		'email_verified_at',
		'created_at',
		'updated_at',
		'deleted_at',
	];

	protected $hidden = [
		'password',
		'remember_token',
		'two_factor_recovery_codes',
		'two_factor_secret',
	];

	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	protected $appends = [
		'profile_photo_url',
	];

	public function getEmailVerifiedAtAttribute($value): ?string
	{
		return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)
		                      ->format(config('ryada.date_format') . ' ' . config('ryada.time_format')) : null;
	}

	public function setEmailVerifiedAtAttribute($value)
	{
		$this->attributes['email_verified_at'] = $value ?
			Carbon::createFromFormat(config('ryada.date_format') . ' ' . config('ryada.time_format'), $value)
			      ->format('Y-m-d H:i:s') : null;
	}

	public function setPasswordAttribute($input)
	{
		if ($input) {
			$this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
		}
	}

	protected function serializeDate(DateTimeInterface $date): string
	{
		return $date->format('Y-m-d H:i:s');
	}

	public function blogs(): \Illuminate\Database\Eloquent\Relations\HasMany
	{
		return $this->hasMany(Blog::class, 'author_id');
	}

	public function documents(): \Illuminate\Database\Eloquent\Relations\HasMany
	{
		return $this->hasMany(Document::class , 'user_id');
	}
}
