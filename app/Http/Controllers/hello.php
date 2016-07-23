<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class Hello extends Controller
{
	public function index()
	{
    echo "Hi World";
	}	

	public function show($name)
	{

		return View('hello',array('name'=>$name));
	}
}
