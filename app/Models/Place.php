<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Core\CrudModel;

class Place extends CrudModel
{
    protected $guarded = ['id'];

    protected $table = 'places';

    protected $fillable = ['place_name', 'description', 'coordinates'];
}