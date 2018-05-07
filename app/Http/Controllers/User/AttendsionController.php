<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Attention;
use Auth;
use Validator;
use Carbon\Carbon;
use App\Http\Controllers\Controller;


class AttendsionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendsions = Attention::where('user_id', Auth::user()->id)->paginate(config('app.pagination'));
        $data = [
            'attendsions' => $attendsions,
        ];
        return view("employees.attendsion.index", $data);
    }

    public function store(Request $request)
    {
        $timeNow = Carbon::now();
        $attendsions = new Attention();
        $attendsions->date = $timeNow;
        $attendsions->user_id = Auth::user()->id;
        // return date of the latest date
        $checkExitDate = Attention::where('user_id', Auth::user()->id)->orderBy('date','desc')->value('date');
        // cut element
        $checkExitDate = substr( $checkExitDate , 0, 10);
        if(!($timeNow->format('Y-m-d') === $checkExitDate)) {
        $attendsions->save();
        session()->flash('success', trans('message.attendtion_success'));
        return redirect()->route('attendsion.index'); 
        }
        else 
        session()->flash('success', trans('message.attendtion_fail'));
        return redirect()->route('attendsion.index'); 
    }

     public function statistical()
    {
        $attendsions = Attention::where('user_id',Auth::user()->id)->whereMonth('date', Carbon::now()->format('m'))->whereYear('date', Carbon::now()->format('Y'))->paginate(config('app.pagination'));
        $data = [
            'attendsions' => $attendsions,
        ];
        return view("employees.attendsion.statistic", $data);
    }
}
