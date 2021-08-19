<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Core\CrudModel;

class Route extends CrudModel
{
    protected $guarded = ['id'];

    protected $table = 'routes';

    protected $fillable = ['route', 'places', 'description'];

    /**
     * @named Funcion para convertir a string (Estandarizada)
     * @param $value
     * @return mixed
     */
    public function formatTypeArray($value){
        if (is_int($value) AND intval($value)>0){
            return '{'.$value.'}';
        }
        if (is_array($value)){
            $value = array_unique($value);
            if(count($value)>0) {
                $value = json_encode($value);
                $value = str_replace('"', '', $value);
                $value = str_replace('[', '{', $value);
                $value = str_replace(']', '}', $value);
                return $value;
            }
        }

        return '{}';
    }
    public function getActivityIdAttribute($val)
    {
        $new_val = $value = str_replace('{', '[', $val);
        $new_val = $value = str_replace('}', ']', $new_val);
        return json_decode($new_val);
    }

}