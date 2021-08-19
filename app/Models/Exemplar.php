<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Core\CrudModel;

class Exemplar extends CrudModel
{
    protected $guarded = ['id'];

    protected $table = 'models';

    protected $fillable = ['id', 'icon', 'observation', 'name'];

     public function vehicle(){
    	return $this->hasOne('App\Models\Vehicle');
    }

}