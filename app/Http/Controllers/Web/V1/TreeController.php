<?php

namespace App\Http\Controllers\Web\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TreeController extends Controller
{
    public  function tree(Request $request){
        return view('features.V1.family.tree');
    }
}
