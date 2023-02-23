<?php

namespace App\Models;

use App\Helpers\HasCover;
use App\Helpers\HasLogo;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Program extends Model implements HasMedia
{
	use HasFactory, InteractsWithMedia, HasLogo, HasCover;

	public    $table    = 'programs';
	protected $fillable = ['name', 'program_id', 'content'];
	protected $dates    = ['created_at', 'updated_at', 'deleted_at',];
	protected $appends  = ['cover', 'cover_thumbnail', 'logo', 'logo_thumbnail'];

	protected function serializeDate(DateTimeInterface $date): string
	{
		return $date->format('Y-m-d H:i:s');
	}

	public function parentProgram(): \Illuminate\Database\Eloquent\Relations\BelongsTo
	{
		return $this->belongsTo(self::class, 'program_id');
	}

	public function programs(): \Illuminate\Database\Eloquent\Relations\HasMany
	{
		return $this->hasMany(self::class, 'program_id');
	}

	public function getProgramsName(): string
	{
		return implode(' - ', $this->programs->pluck('name')->toArray());
	}

	public function getChildProgramsIds(): array
	{
		return $this->programs->pluck('id')->toArray();
	}
	
	public function getCoverThumbnailAttribute(): ?string
	{
		return $this->getCoverMedia()?->getUrl('thumb');
	}

	public function getLogoThumbnailAttribute(): ?string
	{
		return $this->getLogoMedia()?->getUrl('thumb');
	}

	public function registerMediaCollections(): void
	{
		$this->addMediaCollection(config("ryada.collections.models_logo"))->singleFile();
		$this->addMediaCollection(config("ryada.collections.models_cover"))->singleFile();
	}

	public function registerMediaConversions(Media $media = null): void
	{
		$this->addMediaConversion('thumb')->nonQueued()->width(150)->height(150);
	}

	
}
