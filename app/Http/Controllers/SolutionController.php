<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SolutionController extends Controller
{
    public function solutionOne() {
        dd('solution 1');
    }

    public function solutionTwo() {
        $input = array('0'=>'z1', '1'=>'Z10', '2'=>'z12', '3'=>'Z2', '4'=>'z3');
        natcasesort($input);
        dd($input);
    }

    public function solutionThree() {
        dd('solution 3');
    }
}
