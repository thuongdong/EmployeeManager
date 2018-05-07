<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Overtime;
use Auth;
use Validator;
use DB;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddOvertimeRequest;
use App\Http\Requests\UpdateOvertimeRequest;

class OvertimeController extends Controller
{
    public function index()
    {
        $overtimes = Overtime::where('user_id', Auth::user()->id)->paginate(config('app.pagination'));
        $data = [
            'overtimes' => $overtimes,
        ];
        return view("employees.overtime.index", $data);
    }

    public function create()
    {
        return view("employees.overtime.create");
    }

    public function store(AddOvertimeRequest $request)
    {
        $overtimes = new Overtime();
        $overtimes->date = $request->date;
        $overtimes->start_time = $request->from;
        $overtimes->end_time = $request->to;
        $overtimes->content = $request->content;
        // count hours OT
        $toTime = strtotime($overtimes->end_time);
        $fromTime = strtotime($overtimes->start_time);
        $hour = ceil($toTime - $fromTime)/(60*60);
        $overtimes->hours = $hour;
        $overtimes->user_id = Auth::user()->id;
        
        $overtimes->save();
        $request->session()->flash('success',trans('message.add_success'));
        return redirect()->route('overtime.index');  
    }

    public function show($id)
    {
        $overtimes = Overtime::findOrFail($id);
        $data = [
            'overtimes' => $overtimes,
        ];
        return view("employees.overtime.show", $data);
    }

    public function edit($id)
    {
        $overtimes = Overtime::findOrFail($id);
         $data = [
            'overtimes' => $overtimes,
        ];
        return view("employees.overtime.edit", $data);
    }

    public function update(UpdateOvertimeRequest $request, $id)
    {
        $overtimes = Overtime::findOrFail($id);
        $overtimes->date = $request->date;
        $overtimes->start_time = $request->from;
        $overtimes->end_time = $request->to;
        $overtimes->content = $request->content;
        // count hours OT
        $toTime = strtotime($overtimes->end_time);
        $fromTime = strtotime($overtimes->start_time);
        $hour = ceil($toTime - $fromTime)/(60*60);
        $overtimes->hours = $hour;
        $overtimes->user_id = Auth::user()->id;
        $overtimes->save();
        $request->session()->flash('success', trans('message.edit_success'));
        return redirect()->route('overtime.index');
    }

    public function destroy($id)
    {
    	$overtimes = Overtime::findOrFail($id);
    	$overtimes->delete();
    	return redirect()->route('overtime.index')->with('success', trans('message.delete_success'));
    }

     public function statistical()
    {
         // statistical overtimes of month
        $overtimes = Overtime::select(DB::raw('sum(hours) as sum_hours, date'))
                     ->where('user_id', Auth::user()->id)
                     ->whereMonth('date', Carbon::now()->format('m'))
                     ->whereYear('date', Carbon::now()->format('Y'));
        $sumHour = $overtimes->sum('hours');
        $overtimes = $overtimes->groupBy('date')->paginate(config('app.pagination'));
        $data = [
            'overtimes' => $overtimes,
            'sumHour' => $sumHour,
        ];
        return view("employees.overtime.statistic",  $data);
    }

}
