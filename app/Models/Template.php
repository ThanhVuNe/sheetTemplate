<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Template extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'price', 'discount', 'image_path', 'category_id'];

    /**
     * Template has belong to category
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
