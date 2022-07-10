<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
public $appends = ['cover_image'];

    protected static function booted()
    {
        static::deleting(function ($model) {

            if($model->image):
                Storage::disk('public')->delete($model->image);
            endif;
        });
    }

    public function getCoverImageAttribute()
    {
        return asset('uploads/'.$this->image);
    }

    public function category() {
        return $this->belongsTo(Category::class,'category_id');
    }
}
