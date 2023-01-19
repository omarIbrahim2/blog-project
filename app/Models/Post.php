<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id' , 'created_at' , 'updated_at'];


    public function user(){
        return $this->belongsTo(User::class , 'author' , 'id');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function dateFormat(){
        return $this->created_at->format('M d Y');    }

}
