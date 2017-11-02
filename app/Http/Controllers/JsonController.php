<?php

namespace App\Http\Controllers;
use App\NewsCats;
use App\Nature;


class JsonController extends Controller
{
    public function __construct(){
    }

    public function qualificationid1($pid)
    {
        $Nature = new Nature();
        $d3=get_arr(76,$pid);
        $str='';
        foreach  ($d3 as $k => $v){
            $sl=$k==$pid?'selected':'';
            $str.="<option {$sl} value=\"{$k}\">{$v}</option>";
        }
        return response($str)->header('Content-Type', 'text/html');

    }
}

