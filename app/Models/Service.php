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



class Service extends Model implements HasMedia
{
		use HasFactory, InteractsWithMedia, HasLogo, HasCover;


	public    $table    = 'services';
	protected $fillable = ['name', 'content', 'description', 'order_all_child', 'service_id'];
	protected $dates    = ['created_at', 'updated_at', 'deleted_at'];
	protected $appends  = ['logo', 'logo_thumbnail'];

	protected function serializeDate(DateTimeInterface $date): string
	{
		return $date->format('Y-m-d H:i:s');
	}

	public function parentService(): \Illuminate\Database\Eloquent\Relations\BelongsTo
	{
		return $this->belongsTo(self::class, 'service_id');
	}

	public function services(): \Illuminate\Database\Eloquent\Relations\HasMany
	{
		return $this->hasMany(self::class, 'service_id');
	}

	public function orders(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
	{
		return $this->belongsToMany(Order::class, 'service_order');
	}

	public function getServicesName(): string
	{
		return implode(' - ', $this->services->pluck('name')->toArray());
	}

	public function getChildServicesIds(): array
	{
		return $this->services->pluck('id')->toArray();
	}

	public function canOrderAllChild(): bool
	{
		return $this->attributes['order_all_child'];
	}

	public function getShortContentAttribute(): string
	{
		return Str::words($this->attributes['description'], 5);
	}
	
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
		$this->addMediaConversion('thumb')->nonQueued()->width(150)->height(150);
	}

}
