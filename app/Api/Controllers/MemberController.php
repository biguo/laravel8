<?php

namespace App\Api\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    //
    public function show(Request $request)
    {
        $params = $request->all();
        print_r($params);
        print_r('MemberController_show');
    }
}
