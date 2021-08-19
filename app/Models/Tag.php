<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Core\CrudModel;

class Tag extends CrudModel
{
    protected $table = 'tags';
    protected $guarded = ['id'];
    protected $fillable = ['numid','asossiation','observation'];

    public function vehicle(){
        return $this->belongsTo('App\Models\Vehicle');
    }

    public function container(){
    	return $this->belongsTo('App\Models\Container');
    }
}