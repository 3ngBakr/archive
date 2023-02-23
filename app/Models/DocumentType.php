<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class DocumentType extends Model
{
	use HasFactory;

	public    $table    = 'document_types';
	protected $fillable = ['name'];
	protected $dates    = ['created_at', 'updated_at', 'deleted_at',];

	protected function serializeDate(DateTimeInterface $date)
	{
		return $date->format(config('ryada.datetime_format', 'Y-m-d H:i:s'));
	}

	public function documents(): BelongsToMany
	{
		return $this->belongsToMany(Document::class, 'documents_types', 'document_type_id');
	}
}
