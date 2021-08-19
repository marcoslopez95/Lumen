<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Core\CrudModel;

class Type extends CrudModel
{
    protected $table = "types";
    protected $guarded = ['id'];
    protected $fillable = ['name','detail'];

     public function vehicle(){
    	return $this->belongsTo('App\Models\Vehicle');
    }
}