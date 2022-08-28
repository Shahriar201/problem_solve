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

        $number = 1;
        foreach ($array as $key => $value) {
            if ($value['speed'] > 60) {
                    $total = $number++;
            }
        }

        return view('solution-one', compact('array', 'total'));
    }

    public function solutionTwo() {
        $input = array('0'=>'z1', '1'=>'Z10', '2'=>'z12', '3'=>'Z2', '4'=>'z3');
        natcasesort($input);

        return view('solution-two', compact('input'));
    }

    public function solutionThree() {
        $ip = "192.168.0.1";

        return view('solution-three', compact('ip'));
    }
}
