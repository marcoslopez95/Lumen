<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Core\CrudModel;

class Vehicle extends CrudModel
{
    protected $table = 'vehicles';
    protected $guarded = ['id'];
    protected $fillable = ['plate','vehicleID','weight','price','type_id','color_id','driver','front_pic','brand_id','model_id','year','serial','motor_number','tank_cap','veh_cap','observation','tag_num','tag_id'];

    public function brand(){
    	return $this->belongsTo('App\Models\Brand');
    }

    public function model(){
    	return $this->belongsTo('App\Models\Exemplar');
    }

    public function type(){
    	return $this->belongsTo('App\Models\Type');
    }

    public function color(){
    	return $this->belongsTo('App\Models\Color');
    }

    public function tag(){
    	return $this->hasMany('App\Models\Tag');
    }

    public function container(){
        return $this->belongsTo('App\Models\Container');
    }
}