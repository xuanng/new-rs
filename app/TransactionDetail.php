<?php

namespace RS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetail extends Model
{
	use SoftDeletes;

    protected $table = 'transaction_details';
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function TransactionDetail()
    {
    	return $this->hasMany('RS\transaction_head','name','id');
    }
    public function Catalog()
    {
    	return $this->hasOne('RS\Catalog','id','catalog_id');
    }
}
