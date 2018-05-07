<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Overtime;
use Auth;
use DB;
use Validator;
use Carbon\Carbon;

class OvertimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $overtimes = Overtime::select(DB::raw('sum(hours) as sum_hours, user_id'))
                     ->whereDate('date', Carbon::now()->format('Y-m-d'));
        $sumHours = $overtimes->sum('hours');
        $overtimes = $overtimes->groupBy('user_id')->paginate(config('app.pagination'));
        // statistical attendsions of Month
        $filterNames = Overtime::select(DB::raw('sum(hours) as sum_hours, user_id'))
                     ->whereMonth('date', Carbon::now()->format('m'))
                     ->whereYear('date', Carbon::now()->format('Y'))
                     ->groupBy('user_id')
                     ->paginate(config('app.pagination'));
        $data = [
            'overtimes' => $overtimes,
            'filterNames' => $filterNames,
            'sumHours' => $sumHours,
        ];
        return view("admin.overtime.index", $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $overtimes = Overtime::where('user_id',$id)
                    ->whereDate('date', Carbon::now()->format('Y-m-d'))->get();
        $data = [
            'overtimes' => $overtimes,
        ];
        return view("admin.overtime.show", $data);
    }

    public function statistical($id)
    {
        $overtimes = Overtime::where('user_id', $id)
                    ->whereMonth('date', Carbon::now()->format('m'))
                    ->whereYear('date', Carbon::now()->format('Y'))->paginate(config('app.pagination'));
        $sumHours = $overtimes->sum('hours');
        $data = [
            'overtimes' => $overtimes,
            'sumHours' => $sumHours,
        ];
        return view("admin.overtime.statistical", $data);
    }
}
