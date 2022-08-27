<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class SolutionController extends Controller
{
    public function solutionOne() {
        $client = new Client();
        $response = $client->get('http://103.219.147.17/api/json.php', ['verify' => true]);
        $data =  json_decode(\json_encode(json_decode(($response->getBody())->getContents(), true)));
        $getApi = (object)$data;
        $result = $getApi->data;
        dd($getApi);

        $myArray = explode(',', $result);
        // dd($myArray);

        // $myArray->map(function($item, $key) {
        //     return $item;
        // });
        // dd($myArray);
        $length = count($myArray);

        for ($i = 1; $i < count($myArray); $i = i+2) {
            // dd($myArray[$i]);
            $s = explode('=', $myArray[$i]);
            if ($s[1] < 60) {
                dd($s[1]);
            }
            // dd($s);
            // dd('error');
        }
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
