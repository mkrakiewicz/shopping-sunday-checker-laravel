<?php

namespace App\Http\Controllers;

class ShoppingSundayInfoController extends Controller
{

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('shopping-sunday/index');
    }
}
