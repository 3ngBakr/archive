<?php

namespace App\Models;

use App\Helpers\InteractsWithFiles;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends Model implements HasMedia
{
	use HasFactory, InteractsWithMedia, InteractsWithFiles;

	public    $table    = 'documents';
	protected $fillable = ['name', 'description','sender','reciver'];
	protected $dates    = ['created_at', 'updated_at', 'deleted_at'];

	protected function serializeDate(DateTimeInterface $date): string
	{
		return $date->format(config('ryada.datetime_format', 'Y-m-d H:i:s'));
	}
	public function users(): BelongsTo
	{
		return $this->belongsTo(User::class, 'user_id');
	}
	public function documentTypes(): BelongsToMany
	{
		return $this->belongsToMany(DocumentType::class, 'documents_types', 'document_id');
	}

	public function addFileFromRequest(string $key)
	{
		$this->addMediaFromRequest($key)->toMediaCollection(config('ryada.collections.downloads'));
	}

	public function hasFile(): bool
	{
		return $this->hasMedia(config('ryada.collections.downloads'));
	}

	public function getFileMedia(): ?\Spatie\MediaLibrary\MediaCollections\Models\Media
	{
		return $this->getFirstMedia(config("ryada.collections.downloads"));
	}

	public function registerMediaCollections(): void
	{
		$this->addMediaCollection(config("ryada.collections.downloads"))->singleFile();
	}
}
