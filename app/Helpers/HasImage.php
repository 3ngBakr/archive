<?php

namespace App\Helpers;

trait HasImage
{
	public function getImageMedia(): ?\Spatie\MediaLibrary\MediaCollections\Models\Media
	{
		return $this->getFirstMedia(config("ryada.collections.models_image"));
	}

	public function hasImage(): bool
	{
		return $this->hasMedia(config("ryada.collections.models_image"));
	}

	public function addImageFromRequest(): void
	{
		$this->addMediaFromRequest('image')->toMediaCollection(config("ryada.collections.models_image"));
	}

	public function getImageAttribute(): ?string
	{
		return $this->getImageMedia()?->getUrl();
	}

	public function addImageFromPath(string $path): void
    {
        $this->addMedia($path)->preservingOriginal()->toMediaCollection(config("ryada.collections.models_image"));
    }
}