<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use IPset\Ipset;

class SolutionController extends Controller
{
    public function solutionOne() {
        dd('solution 1');
    }

    public function solutionTwo() {
        $input = array('0'=>'z1', '1'=>'Z10', '2'=>'z12', '3'=>'Z2', '4'=>'z3');
        natcasesort($input);

        return view('solution-two', compact('input'));
    }

    public function solutionThree() {
    //     $ipaddress = '192.168.0.1';
    //    if (isset($_SERVER['HTTP_CLIENT_IP']))
    //        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    //    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
    //        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    //    else if(isset($_SERVER['HTTP_X_FORWARDED']))
    //        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    //    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
    //        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    //    else if(isset($_SERVER['HTTP_FORWARDED']))
    //        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    //    else if(isset($_SERVER['REMOTE_ADDR']))
    //        $ipaddress = $_SERVER['REMOTE_ADDR'];
    //    else
    //        $ipaddress = 'UNKNOWN';
    //    return $ipaddress;

        Validator::extend('ip_range',function ($attribute, $value, $parameters){
            $ipset = new IPSet(array('192.168.1.0/24'));
            return ($ipset->match($value));

        });
    }
}
