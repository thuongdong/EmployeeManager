<?php

namespace App\Http\Controllers\User;

use App\Models\Report;
use Auth;
use Validator;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddReportRequest;
use App\Http\Requests\UpdateReportRequest;

class ReportController extends Controller
{
    
    public function index()
    {
        $reports = Report::where('user_id', Auth::user()->id)->paginate(config('app.pagination'));
        $data = [
            'reports' => $reports,
        ];
        return view("employees.report.index", $data);
    }

    public function create()
    {
        return view("employees.report.create");
    }

    public function store(AddReportRequest $request)
    {
        $reports = new Report();
        $reports->date = $request->date;
        $reports->today_content = $request->todayContent;
        $reports->tomorrow_content = $request->tomorrowContent;
        $reports->problem = $request->problem;
        $reports->user_id = Auth::user()->id;
        
        $reports->save();
        $request->session()->flash('success', trans('message.add_success'));
        return redirect()->route('report.index');  
    }

    public function show($id)
    {
        $reports = Report::findOrFail($id);
        $data = [
            'reports' => $reports,
        ];
        return view("employees.report.show", $data);
    }

    public function edit($id)
    {
        $reports = Report::findOrFail($id);
        $data = [
            'reports' => $reports,
        ];
        return view("employees.report.edit", $data);
    }

    public function update(UpdateReportRequest $request, $id)
    {
        $reports = Report::findOrFail($id);
        $reports->today_content = $request->todayContent;
        $reports->tomorrow_content = $request->tomorrowContent;
        $reports->problem = $request->problem;
        $reports->save();
        $request->session()->flash('success', trans('message.edit_success'));
        return redirect()->route('report.index');
    }
}
