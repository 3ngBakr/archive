<?php

namespace App\Models;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Helpers\HasLogo;
use App\Helpers\HasImage;
use App\Helpers\HasCover;
use Spatie\MediaLibrary\InteractsWithMedia;


/**
 * App\Models\Main
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string|null $cover
 * @property-read string|null $image
 * @property-read string|null $image_thumbnail
 * @property-read string|null $logo
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|Media[] $media
 * @property-read int|null $media_count
 * @method static \Illuminate\Database\Eloquent\Builder|Main newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Main newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Main query()
 * @method static \Illuminate\Database\Eloquent\Builder|Main whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Main whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Main whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Main whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Main whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Main extends Model implements HasMedia
{
  
    use HasFactory,InteractsWithMedia,HasImage;
    
	public    $table    = 'mains';
	protected $fillable = ['name', 'description'];
	protected $dates    = ['created_at', 'updated_at', 'deleted_at'];
	protected $appends  = ['image', 'image_thumbnail'];


    protected function serializeDate(DateTimeInterface $date): string
	{
		return $date->format('Y-m-d H:i:s');
	}

	public function getImageThumbnailAttribute(): ?string
	{
		return $this->getImageMedia()?->getUrl('thumb');
	}

	public function registerMediaCollections(): void
	{
		$this->addMediaCollection(config("ryada.collections.models_image"))->singleFile();;
	}

	public function registerMediaConversions(Media $media = null): void
	{
		$this->addMediaConversion('thumb')->nonQueued()->width(150)->height(150);
	}
}
