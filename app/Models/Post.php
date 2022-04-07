<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{

    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'title','description','published_at','content','image','category_id','user_id'
     ];

     public function deleteImage(){
        Storage::delete($this->image);
        // Storage::disk('s3')->delete($this->image);
    }
    public function category(){
       return  $this->belongsTo(Category::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
    public function hasTag($tagid){
        return in_array($tagid, $this->tags->pluck('id')->toArray());
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
