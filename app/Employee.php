<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table="employees";
    protected $primary_key="id";
    protected $fillable=['id','name','email','contact_number','position'];
}
