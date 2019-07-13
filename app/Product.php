<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
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
                'source' => 'title'
            ]
        ];
    }
    protected $fillable = [
        'title',
        'slug',
        'desc',
        'keywords',
        'content_tab1',
        'content_tab2',
        'content_tab3',
        'seo_title',
        'image'
    ];
  
    /**
     * get the tags that associated with given post
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * get the list tags of current post.
     * @return mixed
     */
    public function getTagListAttribute()
    {
        return $this->tags->pluck('name')->all();
    }

    public function getRelatedPostsAttribute()
    {
        $limit = 5;

        $product_tag = $this->tags->pluck('id');

        return Post::publish()
            ->whereHas('tags', function($q) use ($product_tag){
                $q->whereIn('id', $product_tag);
            })
            ->where('id', '!=', $this->id)
            ->orderBy('updated_at', 'desc')
            ->limit($limit)
            ->get();       
    }

}
