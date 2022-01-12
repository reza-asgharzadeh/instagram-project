<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
      'description',
      'url',
      'image',
      'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function profileImage(){
        $imageUrl = ($this->image) ? $this->image : "default.png";
        return "/profiles/images/$imageUrl";
    }
}
