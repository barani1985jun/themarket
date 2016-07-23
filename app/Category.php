<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey='id';
    protected $table='categories';
    protected $fillable=array('category_name','created_at_ip','updated_at_ip');

    public function brands()
    {
    	return $this->belongsToMany('App\Brand');
    }
}
