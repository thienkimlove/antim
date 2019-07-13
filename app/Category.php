<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected $fillable = [
        'name',
        'seo_name',
        'parent_id',
        'slug',
        'desc',
        'keywords',
        'index_display'
    ];

    /**
     * parent of this category
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo('App\Category', 'parent_id', 'id');
    }

    /**
     * sub of this category
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subCategories()
    {
        return $this->hasMany('App\Category', 'parent_id', 'id');

    }
    
    public function getListPostsAttribute()
    {
        if ($this->subCategories->count() == 0) {
            return Post::where('category_id', $this->id)->where('status', true)->orderBy('updated_at', 'desc')->limit(6)->get();
        } else {
            $categoryIds = $this->subCategories->pluck('id')->all();
            $categoryIds[] = $this->id;
            return Post::whereIn('category_id', $categoryIds)->where('status', true)->orderBy('updated_at', 'desc')->limit(6)->get();
        }
    }
    
    public function posts()
    {
        return $this->hasMany(Post::class)->where('status', true)->orderBy('updated_at', 'desc');
    }
  
}
