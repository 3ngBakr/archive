<?php

namespace App\Helpers;

use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

trait InteractsWithFiles
{
	public function hasFileOrFiles(): bool
	{
		if (method_exists($this, 'hasFile')) {
			return $this->hasFile();
		}

		return $this->hasFiles();
	}

	public function getFileOrFilesMedia(): MediaCollection|Media|null
	{
		if (method_exists($this, 'getFileMedia')) {
			return $this->getFileMedia();
		}

		return $this->getFilesMedia();
	}
}
