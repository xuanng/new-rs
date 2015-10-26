<?php

namespace RS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionHead extends Model
{
	use SoftDeletes;

    protected $table = 'transaction_heads';
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function TransactionDetails()
    {
    	return $this->hasMany('RS\transaction_detail','transaction_head_id','name');
    }
}
