<?php

namespace RS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Catalog extends Model
{
	use SoftDeletes;

    protected $table = 'catalogs';
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function Category()
    {
    	return $this->hasOne('RS\Category','name','category');
    }
    public function Cart()
    {
    	return $this->hasMany('RS\Cart','price','name');
    }
    public function TransactionDetail()
    {
        return $this->hasMany('RS\TransactionDetail','price','name');
    }
}
