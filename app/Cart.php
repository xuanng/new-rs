<?php

namespace RS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
	use SoftDeletes;

    protected $table = 'carts';
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function Catalog()
    {
    	return $this->hasOne('RS\Catalog','id','catalog_id');
    }
}
