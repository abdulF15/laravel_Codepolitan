<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class hellocontroller extends Controller
{
    function index(){
        echo "Hello From Index";
    }
    function people(){
        echo "Hello People";
    }
}
