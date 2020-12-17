<?php

namespace App\Http\Controllers;

use App\Models\PrizeObject;
use App\Models\Refund;
use App\Models\Type;
use App\Models\Win;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LotteryController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('dashboard', compact('user'));
    }

    public function lottery()
    {
        $types = Type::where('status', 1)->get();

        $type = $types->random(1)->first();

        if($type->name == 'money')
        {
            $status = 0;

            $min = 1;
            $max = 1000;

            $prize = rand($min, $max);

        }elseif ($type->name == 'bonus')
        {
            $status = 1;

            $min = 10000;
            $max = 100000;

            $prize = rand($min, $max);

            $user = Auth::user();

            $bonus = $user->bonus + $prize;

            $user->bonus = $bonus;

            $user->save();

        }elseif ($type->name == 'object')
        {

            $objects = PrizeObject::where('status', 1)->get();

            $prize = $objects->random(1)->first();
        }

        if($type->name == 'object')
        {
            Win::create(
                array(
                    'user_id' => Auth::id(),
                    'type_id' => $type->id,
                    'value' => $prize->id,
                    'status' => 0
                )
            );
        }else{
            Win::create(
                array(
                    'user_id' => Auth::id(),
                    'type_id' => $type->id,
                    'value' => $prize,
                    'status' => $status
                )
            );
        }

        return view('lottery', compact('type', 'prize'));
    }

    public function convert(Win $win)
    {
        if($win->type->name == 'money' && $win->status == 0)
        {
            $percent = 9;

            $user = Auth::user();

            $bonus = $user->bonus + ($win->value*(1+$percent));

            $user->bonus = $bonus;

            $user->save();

            $win->status = 1;

            $win->save();
        }

        return redirect()->route('dashboard');
    }

    public function refund(Win $win)
    {
        if($win->type->name == 'money' && $win->status == 0)
        {
            return view('refund', compact('win'));
        }else{
            return redirect()->route('dashboard');
        }
    }

    public function refundStore(Win $win)
    {
        if($win->type->name == 'money' && $win->status == 0)
        {
            Refund::create(
                array(
                    'user_id' => Auth::id(),
                    'win_id' => $win->id,
                    'card' => request()->post()['card'],
                    'status' => 0
                )
            );

            $win->status = 1;

            $win->save();
        }

        return redirect()->route('dashboard');
    }


}
