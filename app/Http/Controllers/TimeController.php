<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\User;
use App\Models\Time;


class TimeController extends Controller
{
    public function index()
    {
        if(Auth::check()) {
            $today = Carbon::today();
            $month = intval($today->month);
            $day = intval($today->day);
            $format = $today->format('Y年m月d日');
            //当日の勤怠を取得
            $items = Time::GetMonthAttendance($month)->GetDayAttendance($day)->get();
            return view('/home',['itmes'=>$items,'day' => $format]);
        } else {
            return redirect('/');
        }
    }
    public function intime() {
        
        $user = Auth::user();
        $oldtimein = Time::where('user_id',$user->id)->latest()->first();

        $oldDay = '';

       
        if($oldtimein) {
            $oldTimePunchIn = new Carbon($oldtimein->punchIn);
            $oldDay = $oldTimePunchIn->startOfDay();
        }
        $today = Carbon::today();

        if(($oldDay == $today) && (empty($oldtimein->punchOut))) {
            return redirect()->back()->with('message','出勤打刻済みです');
        }

        
        if($oldtimein) {
            $oldTimePunchOut = new Carbon($oldtimein->punchOut);
            $oldDay = $oldTimePunchOut->startOfDay();
        }

        if(($oldDay == $today)) {
            return redirect()->back()->with('message','退勤打刻済みです');
        }

        $month = intval($today->month);
        $day = intval($today->day);
        $year = intval($today->year);


        $time = Time::create([
            'user_id' => $user->id,
            'user_name' =>$user->name,
            'punchIn' => Carbon::now(),
            'month' => $month,
            'day' => $day,
            'year' => $year,
        ]);

        return redirect('/home');
    }
    public function outtime() {
        
        $user = Auth::user();
        $timeOut = Time::where('user_id',$user->id)->latest()->first();

        
        $now = new Carbon();
        $punchIn = new Carbon($timeOut->punchIn);
        $breakIn = new Carbon($timeOut->breakIn);
        $breakOut = new Carbon($timeOut->breakOut);
        
        $stayTime = $punchIn->diffInMinutes($now);
        $breakTime = $breakIn-> diffInMinutes($breakOut);
        $workingMinute = $breakTime;
        //1分刻み
        $workingHour = ceil($workingMinute / 1);

        
        if($timeOut) {
            if(empty($timeOut->punchOut)) {
                if($timeOut->breakIn && !$timeOut->breakOut) {
                    return redirect()->back()->with('message','休憩終了が打刻されていません');
                }else {
                    $timeOut->update([
                        'punchOut' => Carbon::now(),
                        'workTime' => $workingHour
                    ]);
                    return redirect()->back()->with('message','お疲れ様でした'); 
                }
            } else {
                $today = new Carbon();
                $day = $today->day;
                $oldPunchOut = new Carbon();
                $oldPunchOutDay = $oldPunchOut->day;
                if ($day == $oldPunchOutDay) {
                    return redirect()->back()->with('message','退勤済みです');
                } else {
                    return redirect()->back()->with('message','出勤打刻をしてください');
                }
            }
        } else {
            return redirect()->back()->with('message','出勤打刻がされていません');
        } 
    }
    public function inbreak() {
        $user = Auth::user();
        $oldtimein = Time::where('user_id',$user->id)->latest()->first();
        if($oldtimein->punchIn && !$oldtimein->punchOut && !$oldtimein->breakIn) {
            $oldtimein->update([
                'breakIn' => Carbon::now(),
            ]);
            return redirect()->back();
        }
        return redirect()->back();
    }

    
    public function outbreak() {
        $user = Auth::user();
        $oldtimein = Time::where('user_id',$user->id)->latest()->first();
        if($oldtimein->breakIn && !$oldtimein->breakOut) {
            $oldtimein->update([
                'breakOut' => Carbon::now(),
            ]);
            return redirect()->back();
        }
        return redirect()->back();
    }
    public function daily() {
        $items = [];
        return view('/daily',['items'=>$items]);
    }
    public function dailyResult(Request $request) {
        $items = Time::where('year',$request->year)->where('month',$request->month)->where('day',$request->day)->get();
        return view('/daily',['items'=> $items]);
    }

}
