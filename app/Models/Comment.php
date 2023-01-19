<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
     
    use SoftDeletes;


    protected $guarded = ['id' , 'created_at' , 'updated_at'];


    public function post(){

        return $this->hasOne(Post::class);
    }


    public function user(){

        return $this->belongsTo(User::class);
    }


}
