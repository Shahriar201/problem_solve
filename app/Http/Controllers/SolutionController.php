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
        $getApiData = (object)$data;

        $array = [];
        $data = explode(',', $getApiData->data);

        for ($i = 0; $i  < count($data); $i++) {
            $string = str_replace(' ', '', $data[$i]);

            if(substr($string,0,5) == "speed") {
                $speed = substr($string,0,5);
                $speedValue = substr($string,6,10);
                array_push($array,[$speed => $speedValue]);
            }
        }

        foreach ($array as $key => $value) {
            if ($value['speed'] > 60) {
                    $sum = $key++;
            }
        }

        return view('solution-one', compact('array', 'sum'));
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

        // Validator::extend('ip_range',function ($attribute, $value, $parameters){
        //     $ipset = new IPSet(array('192.168.1.0/24'));
        //     return ($ipset->match($value));

        // });
        $req = '192.168.0.1';
        $req->validate([

            'ip'

          ]);

        dd('done');

    }
}
