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
        Storage::disk('s3')->delete($this->image);
    }
}
