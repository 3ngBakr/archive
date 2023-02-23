<?php

namespace App\Models;

use App\Helpers\HasLogo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Partner extends Model implements HasMedia
{
	use HasFactory, InteractsWithMedia, HasLogo;

	public    $table    = 'partners';
	protected $fillable = ['name' , 'program_id'];
	protected $appends  = ['logo', 'logo_thumbnail'];

	public function getLogoThumbnailAttribute(): ?string
	{
		return $this->getLogoMedia()?->getUrl('thumb');
	}

	public function registerMediaCollections(): void
	{
		$this->addMediaCollection(config("ryada.collections.models_logo"))->singleFile();
	}

	public function registerMediaConversions(Media $media = null): void
	{
		$this->addMediaConversion('thumb')->nonQueued()->width(400)->height(300);
	}

	
}
