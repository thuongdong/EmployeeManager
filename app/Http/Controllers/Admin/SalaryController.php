<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Salary;
use App\Models\User;
use App\Models\Overtime;
use Carbon\Carbon;

class SalaryController extends Controller
{
	public function index(){
		$salaries = Salary::orderBy('user_id')->paginate(config('app.paginate'));
		return view('admin.salary.index',['salaries' => $salaries]);
	}

    public function create($id){
    	$employee = User::FindOrFail($id);
    	$overtimes = Overtime::where('user_id', $id)
                   ->whereMonth('date', Carbon::now()->format('m'))
                   ->whereYear('date', Carbon::now()->format('Y'))->paginate(config('app.pagination'));
       $sumHours = $overtimes->sum('hours');
    	$data = [
    		'employee' => $employee,
    		'overtimes' => $overtimes,
    		'sumHours' => $sumHours,
    	];
    	return view('admin.salary.create', $data);
    }

    public function store(Request $request, $id){
    	$salary = new Salary();
    	$overtimes = Overtime::where('user_id', $id)
                   ->whereMonth('date', Carbon::now()->format('m'))
                   ->whereYear('date', Carbon::now()->format('Y'))->paginate(config('app.pagination'));
       	$sumHours = $overtimes->sum('hours');
    	$salary->basic_salary = $request->basic_salary;
    	$salary->user_id = $id;
    	$salary->overtime_salary = $sumHours*$request->basic_salary;
    	$salary->insurance_money = $sumHours*$request->basic_salary;
    	$salary->insurance_payment = $sumHours*$request->basic_salary;
    	$salary->real_salary = $sumHours*$request->basic_salary;
    	$salary->save();
    	return redirect()->route('salary.index')->with('success',trans('message.create'));
    }
}
