<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //
    protected $table = 'categorie';
    protected $fillable=['name', 'slug'];
    public function posts(){

    	return $this->hasmany('App\post');
    }
}
