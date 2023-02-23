<?php

namespace App\Models;

use App\Helpers\InteractsWithFiles;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Social extends Model implements HasMedia
{
	use HasFactory, InteractsWithMedia;

	public    $table    = 'socials';
	protected $fillable = ['facebook' , 'twitter', 'whatsapp', 'instagram', 'telegram'];
	protected $dates    = [ 'updated_at'];

/*	protected function serializeDate(DateTimeInterface $date): string
	{
		return $date->format('Y-m-d H:i:s');
	}

	public function addFileFromRequest()
	{
		$this->addMediaFromRequest('file')->toMediaCollection(config("ryada.collections.bages"));
	}

	public function hasFile(): bool
	{
		return $this->hasMedia(config("ryada.collections.bages"));
	}

	public function getFileMedia(): ?\Spatie\MediaLibrary\MediaCollections\Models\Media
	{
		return $this->getFirstMedia(config("ryada.collections.bages"));
	}

	public function registerMediaCollections(): void
	{
		$this->addMediaCollection(config("ryada.collections.bages"))->singleFile();
	}*/
}
