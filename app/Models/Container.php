<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Core\CrudModel;

class Container extends CrudModel
{
    protected $table = 'containers';
    protected $guarded = ['id'];
    protected $fillable = ['numid','image','wag_pic','wag_cubing','ext_cubing',
    					   'pis_cubing','tot_cubing','coordinates','observation','vehicle_id','tag_num','tag_id'];

   	
   	public function vehicle(){
   		return $this->hasOne('App\Models\Vehicle');
   	}

   	public function tag(){
   		return $this->hasMany('App\Models\Tag');
   	}
}