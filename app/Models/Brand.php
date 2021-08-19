<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Core\CrudModel;

class Brand extends CrudModel
{
    protected $table = "brands";
    protected $guarded = ['id'];
    protected $fillable = ['name','icon','observation'];

    public function vehicle(){
    	return $this->hasOne('App\Models\Vehicle');
    }
}