<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
  protected $table = 'device';
  protected $primaryKey = 'device_id';

  public function manu()
    {
        return $this->hasOne('App\Manufacturer', 'manufacturer_id', 'device_manufacturer');
    }

  public function type()
    {
        return $this->hasOne('App\Type', 'type_id', 'device_type');
    }

    public function itemmodel()
      {
          return $this->hasOne('App\ItemModel', 'model_id', 'device_model');
      }

}
