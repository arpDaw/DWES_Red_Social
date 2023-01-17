<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function image(){
        return $this->belongsTo(Image::class, 'image_id');
    }

}
