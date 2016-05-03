<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class wilaya extends Model
{
    //
    public $timestamps = false;
    public $table='wilaya';
    protected  $primarykey = 'wilayaID';

       public function getKeyName(){
    return "wilayaID";
}
public function commune(){

	return $this->belongsTo('App\commune');
}

}
