<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\VacationFulltime;
use App\Models\VacationParttime;

class VacationController extends Controller
{
    public function index(){
    	$fulltimes = VacationFulltime::all();
    	$fulltimes = $fulltimes->unique('user_id');
    	$listfulltimes = VacationFulltime::orderBy('date','DESC')->paginate(config('app.paginate'));
    	$parttimes = VacationParttime::all();
    	$parttimes = $parttimes->unique('user_id');
    	$listparttimes = VacationParttime::orderBy('date','DESC')->paginate(config('app.paginate'));
    	$data = ['fulltimes' => $fulltimes,'parttimes' => $parttimes,'listfulltimes' => $listfulltimes, 'listparttimes' => $listparttimes];
    	return view('admin.vacation.index', $data);
    }
}
