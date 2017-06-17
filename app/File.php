<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class File extends Model
{
	use SoftDeletes;

	protected $fillable = [
		'title',
		'overview_short',
		'overview',
		'price',
		'live',
		'approved',
		'finished'
	];

	protected static function boot()
	{
		parent::boot();

		static::creating(function($file) {
			$file->identifier = uniqid(true);
		});
	}

	public function getRouteKeyName()
	{
		return 'identifier';
	}

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function scopeFinished(Builder $builder)
    {
    	return $builder->where('finished',true);
    }

    public function isFree()
    {
    	return $this->price == 0;
    }
}
