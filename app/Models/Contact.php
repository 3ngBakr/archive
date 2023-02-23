<?php

namespace App\Models;

use App\Helpers\InteractsWithFiles;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Contact extends Model implements HasMedia
{
	use HasFactory, InteractsWithMedia, InteractsWithFiles;

	public    $table    = 'contacts';
	protected $fillable = ['name', 'email', 'phone', 'subject', 'message'];
	protected $dates    = ['created_at', 'updated_at', 'deleted_at'];

	protected function serializeDate(DateTimeInterface $date): string
	{
		return $date->format('Y-m-d H:i:s');
	}

	public function addFileFromRequest()
	{
		$this->addMediaFromRequest('file')->toMediaCollection(config("ryada.collections.contacts"));
	}

	public function hasFile(): bool
	{
		return $this->hasMedia(config("ryada.collections.contacts"));
	}

	public function getFileMedia(): ?\Spatie\MediaLibrary\MediaCollections\Models\Media
	{
		return $this->getFirstMedia(config("ryada.collections.contacts"));
	}

	public function registerMediaCollections(): void
	{
		$this->addMediaCollection(config("ryada.collections.contacts"))->singleFile();
	}
}
