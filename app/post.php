<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    //
    protected $table = 'post';
protected $fillable=['title', 'slug', 'content','online','category_id'];

public function category(){

	return $this->belongsTo('App\category');
}

public function scopePublier($query){

	return $query->where('online',true)->where('created_at','<','NOW()');
}


public function scopeSearchByTitle($query,$q){

return $query->where('title','LIKE','%'.$q.'%');
}


//mutateur

//le getter permet de modifier a la recuperation
public function getTitleAttribute($value){
return ucfirst($value);
}


//le seter pour le modifier a l'ajout
public function setTitleAttribute($value){

	$this->attributes['title']=strtoupper($value);
}
public function setSlugAttribute($value){

if(empty($value)){
	$this->attributes['slug'] = "rien";
}
}
public function getDates(){
return ['created_at','updated_at'];
}

}
