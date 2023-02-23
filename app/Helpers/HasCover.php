<?php

namespace App\Helpers;

trait HasCover
{
	public function getCoverMedia(): ?\Spatie\MediaLibrary\MediaCollections\Models\Media
	{
		return $this->getFirstMedia(config("ryada.collections.models_cover"));
	}

	public function hasCover(): bool
	{
		return $this->hasMedia(config("ryada.collections.models_cover"));
	}

	public function addCoverFromRequest(): void
	{
		$this->addMediaFromRequest('cover')->toMediaCollection(config("ryada.collections.models_cover"));
	}

	public function getCoverAttribute(): ?string
	{
		return $this->getCoverMedia()?->getUrl();
	}
}