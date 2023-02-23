<?php

namespace App\Models;

use DateTimeInterface;
use App\Helpers\HasCover;
use App\Helpers\HasImage;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Blog extends Model implements HasMedia
{
	use HasFactory, InteractsWithMedia ,HasImage ;

	public    $table    = 'blogs';
	protected $fillable = ['author_id', 'title', 'content', 'type'];
	protected $appends  = ['short_content', 'image' , 'image_thumbnail'];

	protected function serializeDate(DateTimeInterface $date): string
	{
		return $date->format('Y-m-d H:i:s');
	}

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class, 'author_id');
	}

	public function getShortContentAttribute(): string
	{
		return Str::words($this->attributes['content'], 5);
	}

	public function getImageThumbnailAttribute(): ?string
	{
		return $this->getImageMedia()?->getUrl('thumb');
	}

	public function registerMediaCollections(): void
	{
		$this->addMediaCollection(config("ryada.collections.models_image"))->singleFile();
	}

	public function registerMediaConversions(Media $media = null): void
	{
		$this->addMediaConversion('thumb')->nonQueued()->width(100)->height(70);
	}
}
