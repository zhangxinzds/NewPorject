<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListController extends Controller
{
    public function index($id)
    {
    	
    	return view('home.list',['title'=>'列表页']);
    }
}
