<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Test;

class TestController extends Controller
{
    public function index()
    {
    	$tests=Test::all();
    	echo "<pre>";print_r($tests);exit;
    }
}
