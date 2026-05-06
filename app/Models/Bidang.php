<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Bidang extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use HasSlug;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'singkatan',
        'slug',
        'description',
        'logo',
        'instagram',
    ];

    public function divisi() {
        return $this->hasMany(Divisi::class, 'bidang_id', 'id');
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

     /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->nonQueued();
    }

    public function pengurus() {
        return $this->hasMany(Pengurus::class, 'bidang_id', 'id');
    }

    public function getMaxRank()
    {
        return $this->pengurus->flatMap(function ($pengurus) {
            return $pengurus->jabatan->pluck('pivot.rank');
        })->max();
    }

    public function getPengurusCountsByRank()
    {
        $maxRank = $this->getMaxRank();
        $counts = [];

        for ($rank = 1; $rank <= $maxRank; $rank++) {
            $counts[$rank] = $this->pengurus->filter(function ($pengurus) use ($rank) {
                return $pengurus->jabatan->contains(function ($jabatan) use ($rank) {
                    return $jabatan->pivot->rank === $rank;
                });
            })->count();
        }

        return $counts;
    }

}
