<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Core\CrudModel;

class Color extends CrudModel
{
    protected $table = 'colors';
    protected $guarded = ['id'];
    protected $fillable = ['name','detail'];

     public function vehicle(){
    	return $this->hasOne('App\Models\Vehicle');
    }
}