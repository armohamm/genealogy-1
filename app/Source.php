<?php

namespace App;

use App\Traits\HasCitations;
use Illuminate\Database\Eloquent\Model;
use LaravelEnso\Comments\app\Traits\Comments;

class Source extends Model
{
    use Comments;
    use HasCitations;

    protected $fillable = ['name', 'description', 'repository_id', 'author_id', 'is_active'];

    protected $attributes = ['is_active' => false];

    protected $casts = ['is_active' => 'boolean'];

    public function repositories()
    {
        return $this->belongsTo(Repository::class);
    }

    public function citations()
    {
        return $this->hasMany(Citations::class);
    }

    public function getCitationListAttribute()
    {
        return $this->citations()->pluck('citation.id');
    }
}
