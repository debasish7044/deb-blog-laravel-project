<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Scope;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasTrixRichText;

    protected $dates = ['publish_at'];
    protected $fillable = ['title','description','content','image','publish_at','category_id','user_id'];


    public function deleteImage (){

        Storage::delete($this->image);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
     public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function hasTag($tagId){

        return in_array($tagId, $this->tags->pluck('id')->toArray());
    }

    // for search functionality

    public function scopeSearched($query)
    {
      $search = request()->query('term');

      if(!$search){
          return $query->published();
      }

     return $query->published()->where('title', "LIKE", "%{$search}%");

    }

    public function scopePublished($query){

        return $query->where('publish_at' ,"<=" ,now());
    }


}
