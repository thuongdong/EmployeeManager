<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\VacationFulltime;
use Illuminate\Support\Facades\Mail;
use Auth;

class VacationFulltimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = VacationFulltime::orderBy('date')->paginate(config('app.paginate'));
        return view('employee.vacation.fulltime.index',['employees'=>$employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.vacation.fulltime.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vacation = new VacationFulltime();
        $vacation->date = $request->date;
        $vacation->reason = $request->reason;
        $vacation->user_id = Auth::user()->id;
        $data = [
            'date' => $vacation->date,
            'reason' => $vacation->reason,
            'name' => $vacation->user->name,
        ];
        $vacation->save();
        Mail::send('employee.vacation.fulltime.mail', ['data' => $data] , function($message) {
        $message->from(Auth::user()->email, Auth::user()->name);
        $message->to('thiennh@haposoft.com', 'Admin');
        $message->subject('Xin nghỉ, đi muộn, về sớm');
        });
        return redirect()->route('vacationfulltime.create')->with('success',trans('message.create'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = VacationFulltime::FindOrFail($id);
        return view('employee.vacation.fulltime.edit',['employee' => $employee]);
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
        $employee = VacationFulltime::FindOrFail($id);
        $employee->date = $request->date;
        $employee->reason = $request->reason;
        $employee->save();
        return redirect()->route('vacationfulltime.index')->with('success',trans('message.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = VacationFulltime::FindOrFail($id);
        $employee->delete();
        return redirect()->route('vacationfulltime.index')->with('success',trans('message.delete'));
    }
}
