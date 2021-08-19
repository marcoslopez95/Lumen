<?php
/**
 * Created by PhpStorm.
 * User: zippyttech
 */

namespace App\Repositories\juego;

use App\Core\CrudRepository;
use App\Models\juego;

/** @property juego $model */
class juegoRepository extends CrudRepository
{

    public function __construct(juego $model)
    {
        parent::__construct($model);
    }

}