<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Admin\User;
use App\Http\Model\Admin\Orders;
use App\Http\Model\Admin\OrderInfo;
class ProController extends Controller
{
    public function ziliao()
    {
    	$user = User::where('id',session('id'))->first();
    	$num = Orders::where('uname',$user['name'])->count();
    	return view('home.ziliao',['title'=>'个人资料','user'=>$user,'num'=>$num]);
    }
}
