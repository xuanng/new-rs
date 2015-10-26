<?php

namespace RS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
	use SoftDeletes;

    protected $table = 'categories';
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function Catalogs()
    {
    	return $this->hasMany('RS\Catalog','category','name');
    }
}
