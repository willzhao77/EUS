<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemModel extends Model
{
  protected $table = 'model';
  protected $primaryKey = 'model_id';

  public function manu()
    {
        return $this->hasOne('App\Manufacturer', 'manufacturer_id', 'manufacturer_id');
    }
}
