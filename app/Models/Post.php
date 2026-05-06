<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use Spatie\Tags\HasTags;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    use HasFactory;
    use SoftDeletes;
    use HasTags;
    use InteractsWithMedia;
    use HasSEO;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'thumbnail',
        'content',
        'status',
        'published_at',
        'category_id',
        'user_id',
        'bidang_id',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function author(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function category(): BelongsTo {
        return $this->belongsTo(PostCategory::class, 'category_id', 'id');
    }

    public function bidang(): BelongsTo {
        return $this->belongsTo(Bidang::class, 'bidang_id', 'id');
    }

}
