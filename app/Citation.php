<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use LaravelEnso\CommentsManager\app\Traits\Comments;

class Citation extends Model
{
    use Comments;

    protected $fillable = ['name', 'description', 'repository_id', 'volume_id', 'page_id', 'is_active', 'confidence', 'source_id'];

    protected $attributes = ['is_active' => false];

    protected $casts = ['is_active' => 'boolean'];

    public function sources()
    {
        return $this->belongsToMany(Source::class);
    }
}
