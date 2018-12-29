<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

use App\Tag;
class Post extends Model
{
  use softDeletes ;
  
  protected $fillable = [
    'title', 'content','category_id','featured','slug'
  ];

  public function getFeaturedAttribute($featured){

    return asset($featured);


  }

  protected $dates = ['deleted_at'];

  public function category(){


    return $this->belongsTo('App\Category');
  }

  public function tags(){

    return $this->belongsToMany('App\Tag');
  }
}
