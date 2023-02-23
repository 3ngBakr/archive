<?php

namespace App\Helpers;

trait HasLogo
{
    public function getLogoMedia(): ?\Spatie\MediaLibrary\MediaCollections\Models\Media
    {
        return $this->getFirstMedia(config("ryada.collections.models_logo"));
    }

    public function hasLogo(): bool
    {
        return $this->hasMedia(config("ryada.collections.models_logo"));
    }

    public function addLogoFromRequest(): void
    {
        $this->addMediaFromRequest('logo')->toMediaCollection(config("ryada.collections.models_logo"));
    }

    public function getLogoAttribute(): ?string
    {
        return $this->getLogoMedia()?->getUrl();
    }

    public function addLogoFromPath(string $path): void
    {
        $this->addMedia($path)->preservingOriginal()->toMediaCollection(config("ryada.collections.models_logo"));
    }
}
