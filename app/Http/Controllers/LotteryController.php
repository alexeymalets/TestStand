<?php

namespace App\Http\Controllers;

use App\Models\PrizeObject;
use App\Models\Type;
use Illuminate\Http\Request;

class LotteryController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function lottery()
    {
        $types = Type::where('status', 1)->get();

        $type = $types->random(1)->first();

        if($type->name == 'money'){

            $min = 1;
            $max = 1000;

            $prize = rand($min, $max);

        }elseif ($type->name == 'bonus'){

            $min = 10000;
            $max = 100000;

            $prize = rand($min, $max);

        }elseif ($type->name == 'object'){
            $objects = PrizeObject::where('status', 1)->get();

            $prize = $objects->random(1)->first();

        }

        return view('lottery', compact('type', 'prize'));
    }
}
