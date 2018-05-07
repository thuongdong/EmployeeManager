<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\VacationParttime;
use Auth;

class VacationParttimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = VacationParttime::orderBy('date')->paginate(config('app.paginate'));
        return view('employee.vacation.parttime.index',['employees'=>$employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.vacation.parttime.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vacation = new VacationParttime();
        $vacation->date=$request->date;
        $vacation->start_time = $request->start_time;
        $vacation->end_time = $request->end_time;
        $vacation->reason = $request->reason;
        $vacation->user_id = Auth::user()->id;
        $vacation->save();
        return redirect()->route('vacationparttime.create')->with('success',trans('message.create'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = VacationParttime::FindOrFail($id);
        return view('employee.vacation.parttime.edit',['employee' => $employee]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee = VacationParttime::FindOrFail($id);
        $employee->date = $request->date;
        $employee->start_time = $request->start_time;
        $employee->end_time = $request->end_time;
        $employee->reason = $request->reason;
        $employee->save();
        return redirect()->route('vacationparttime.index')->with('success',trans('message.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = VacationParttime::FindOrFail($id);
        $employee->delete();
        return redirect()->route('vacationparttime.index')->with('success',trans('message.delete'));
    }
}
