<?php

namespace RS\Providers;

use Illuminate\Support\ServiceProvider;
use Validator, DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('is_active', function($attribute, $value, $parameters) {
            $table = $parameters[0];
            $field = $parameters[1];
            if(DB::table($table)->where($attribute,$value)->first())
                return DB::table($table)->where($attribute,$value)->first()->{$field}; // true or false
            return false;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
